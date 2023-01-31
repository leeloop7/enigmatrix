<?php
namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Customer;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserSelect extends Component
{
    public $userId;
    public $selectedUser;
    public $timeOffs;
    public $sickDays;
    public $workingDays;
    public $totalWorkingDays;
    public $holidays;
    public $groupedEvents;
    public $groupedEventsProjects;


    public function render()
    {
        return view('livewire.user-select')->withUsers(User::orderBy('name')->get())->withCustomers(Customer::all()->keyBy('id'))->withProjects(Project::all()->keyBy('id'));
    }

    public function updatedUserId($value)
    {
        $this->selectedUser = $value ? User::findOrFail($value) : null;
        $this->timeOffs =  $this->selectedUser->events()->whereEventTheme('5')->count();
        $this->sickDays =  $this->selectedUser->events()->whereEventTheme('6')->count();
        $this->holidays =  $this->selectedUser->events()->whereEventTheme('11')->count();
        $workingDays = $this->selectedUser->events()
            ->select(['event_start', 'job_id'])
            ->whereNotIn('job_id', [5, 6, 7, 8, 11])
            ->get()
            ->groupBy(function ($event) {
                return \Carbon\Carbon::parse($event->event_start)->format('d.m.Y');
            })
            ->map(function ($workingDays) {
                return $workingDays->count();
        });

        $this->groupedEvents = $this->selectedUser->events->groupBy("customer_id")
            ->map(fn($events) => $events->sum("event_difference"));

        $this->groupedEventsProject = $this->selectedUser->events->groupBy("project_id")
        ->map(fn($events) => $events->sum("event_difference"));

        $this->totalWorkingDays = $workingDays->count();

    }

}
