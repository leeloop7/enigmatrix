<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Job;
use App\Models\JobDesc;
use App\Models\Project;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Carbon\Carbon;

class UserEventsExport implements WithMultipleSheets
{
    protected $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function sheets(): array
    {
        $sheets = [];

        foreach ($this->users as $user) {
            $sheets[] = new UserEventsSheet($user);
        }

        return $sheets;
    }
}

class UserEventsSheet implements FromCollection
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function collection()
    {
        $events = $this->user->events()
            ->whereMonth('event_start', '=', 1)
            ->orderBy('event_start')
            ->get();

        $data = [];

        foreach ($events as $event) {
            $data[] = [
                'id' => $event->id,
                'datum' => Carbon::parse($event->event_start)->format('d-m-Y'),
                'začetek' => Carbon::parse($event->event_start)->format('H:i:s'),
                'konec' => Carbon::parse($event->event_end)->format('H:i:s'),
                'trajanje' => Carbon::parse($event->event_difference)->format('H:i:s'),
                'vrsta' => $event->job->name,
                'tema' => $event->JobDesc->name,
                'stranka' => $event->customer->name,
                'projekt' => $event->project->name,
                'opis' => $event->event_desc,

            ];
        }

        return collect($data);
    }

    public function title(): string
    {
        return $this->user->name;
    }
}
