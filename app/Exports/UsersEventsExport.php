<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


use Carbon\Carbon;

class UsersEventsExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $users = User::all();
        $sheets = [];

        foreach ($users as $user) {
            $sheets[] = new UserEventsSheet($user);
        }

        return $sheets;
    }
}

class UserEventsSheet implements FromCollection, WithTitle, WithColumnWidths, WithStyles


{
    protected $user;

    protected $highlightedRows = [];

    public function __construct(User $user)
    {
        $this->user = $user;
    }

public function collection()
{
    $events = $this->user->events()
        ->whereMonth('event_start', '=', 4)
        ->orderBy('event_start')
        ->get()
        ->groupBy(function ($event) {
            return Carbon::parse($event->event_start)->format('d.m.Y');
        });

    $data = [];

    $totalDurationSum = 0;

    foreach ($events as $day => $eventsOfDay) {
        $firstEvent = $eventsOfDay->first();
        $lastEvent = $eventsOfDay->last();
        $durationSum = $eventsOfDay->reject(function ($event) {
            return in_array($event->job_id, [5, 6, 7, 11, 12]);
        })->sum('event_difference');
        $totalDurationSum += $durationSum;

        $data[] = [
            'Date' => Carbon::parse($firstEvent->event_start)->format('d.m.Y'),
            'Start Time' => Carbon::createFromFormat('Y-m-d H:i:s', $firstEvent->event_start)->format('H:i:s'),
            'End Time' => Carbon::createFromFormat('Y-m-d H:i:s', $lastEvent->event_end)->format('H:i:s'),
            'Duration Sum' => gmdate('H:i:s', $durationSum),
        ];

        foreach ($eventsOfDay as $event) {
    if (!in_array($event->job_id, [1, 9, 10])) { // Only process events if job_id is not 1, 9 or 10
        if ($event->job_id == 2 && $event->event_difference <= 2700) { // Hide event with job_id = 2 and event_difference <= 45 minutes
            continue;
        }

        $data[] = [
            $event->job->name, // Include the job name in the first column
            Carbon::createFromFormat('Y-m-d H:i:s', $event->event_start)->format('H:i:s'),
            Carbon::createFromFormat('Y-m-d H:i:s', $event->event_end)->format('H:i:s'),
            gmdate('H:i:s', $event->event_difference),
        ];
    }
}
    }


    // Add the total sum to the last row
    $data[] = [
        'Zapisane del. ure:',
        '',
        '',
        $this->formatDuration($totalDurationSum),
    ];

    return collect($data);
}

public function styles(Worksheet $sheet)
{
    // Apply bold and font size 18 styles for the first row of each day
    // If the day contains an event with job id 6 or 7, color it green
    foreach ($sheet->getRowIterator() as $row) {
        $cell = $sheet->getCell('A' . $row->getRowIndex());
        try {
            if (Carbon::createFromFormat('d.m.Y', $cell->getValue()) !== false) {
                $dayHasJob67 = false;
                foreach ($row->getCellIterator() as $dayCell) {
                    $dayEvents = $this->user->events()
                        ->whereDate('event_start', Carbon::parse($dayCell->getValue()))
                        ->get();
                    foreach ($dayEvents as $event) {
                        if ($event->job_id == 6 || $event->job_id == 7) {
                            $dayHasJob67 = true;
                            break 2; // Exit both loops
                        }
                    }
                }

                $fillColor = $dayHasJob67 ? 'FFCC99' : 'FFCCCC';
                $sheet->getStyle('A' . $row->getRowIndex() . ':D' . $row->getRowIndex())->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 18,
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => $fillColor,
                        ],
                    ],
                ]);
            }
        } catch (\Exception $e) {
            // Ignore the exception and continue with the next row
        }
    }

    // Apply bold and font size 18 styles for the last row
    $lastRow = $sheet->getHighestRow();
    $sheet->getStyle('A' . $lastRow . ':D' . $lastRow)->applyFromArray([
        'font' => [
            'bold' => true,
            'size' => 18,
        ],
        'fill' => [
            'fillType' => Fill::FILL_SOLID,
            'startColor' => [
                'argb' => 'FFCCFFFF', // Light blue color
            ],
        ],
    ]);
}





    public function title(): string
    {
        return $this->user->name;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 25,
            'C' => 25,
            'D' => 15,
            'E' => 25,
            'F' => 15,
        ];
    }


    public function formatColumn(string $column, $value, $row, $event): string
{
    if ($column === 'A') {
        $date = Carbon::parse($value);
        return $date->format('d:m:Y');
    } elseif (in_array($column, ['B', 'C'])) {
        $date = Carbon::parse($value);
        return $date->format('H:i:s');
    } elseif ($column === 'E') {
        $jobs = [5, 6, 7, 11, 12];
        $jobNames = [];
        foreach ($row->events as $event) {
            if (in_array($event->job_id, $jobs)) {
                $jobNames[] = $event->job->name;
            }
        }
        return implode(", ", $jobNames);
    } elseif ($column === 'F') {
        $duration = 0;
        foreach ($row->events as $event) {
            if ($event->job_id == 11) {
                $duration += $event->event_difference;
            }
        }
        return gmdate('H:i:s', $duration);
    }

    return $value;
}
private function formatDuration($seconds)
{
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds / 60) % 60);
    $seconds = $seconds % 60;

    return sprintf("%d:%02d:%02d", $hours, $minutes, $seconds);
}

}
