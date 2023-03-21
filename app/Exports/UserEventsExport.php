<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;
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

class UserEventsSheet implements FromCollection, WithTitle
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function collection()
    {
        $events = $this->user->events()
            ->orderBy('event_start')
            ->get();

        $groupedEvents = $events->groupBy(function ($event) {
            return Carbon::parse($event->event_start)->format('Y-m-d');
        });

        $data = [];

        foreach ($groupedEvents as $date => $dayEvents) {
            $data[] = [
                'date' => $date,
                'first_event_start' => $dayEvents->first()->event_start,
                'last_event_end' => $dayEvents->last()->event_end,
                'total_duration' => $dayEvents->sum('event_duration'),
            ];
        }

        return collect($data);
    }

    public function title(): string
    {
        return $this->user->name;
    }
}
