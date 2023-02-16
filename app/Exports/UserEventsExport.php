<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

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
                'title' => $event->title,
                'description' => $event->description,
                'start_time' => $event->event_start,
                'end_time' => $event->event_end,
                'duration' => $event->event_duration,
                'location' => $event->event_location,
                'created_at' => $event->created_at,
                'updated_at' => $event->updated_at,
            ];
        }

        return collect($data);
    }

    public function title(): string
    {
        return $this->user->name;
    }
}
