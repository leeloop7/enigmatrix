<?php
namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Customer;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserFilter extends Component
{
    public $userId;
    public $selectedUser;
    public $timeOffs;
    public $sickDays;
    public $kidsDays;
    public $workingDays;
    public $totalWorkingDays;
    public $holidays;
    public $groupedEvents;
    public $groupedEventsProjects;
    public $workingMinutes;
    public $workingSeconds;
    public $selectedDate = "";
    public $possibleDates = [];
    public $events;


    public function mount() {
        $today = today();
        array_push($this->possibleDates, $today);
        for($i = 1; $i < 12; $i++) {
            array_push($this->possibleDates, today()->subMonths($i));
        }
    }

    public function render()
    {
        return view('livewire.user-filter')->withUsers(User::orderBy('name')->get())->withCustomers(Customer::all()->keyBy('id'))->withProjects(Project::all()->keyBy('id'));
    }

    public function updatedSelectedDate($value)
    {
        $this->selectedDate = $value;
        $this->calculateEverything();
    }

    public function updatedUserId($value)
    {
        $this->selectedUser = $value ? User::findOrFail($value) : null;
        $this->calculateEverything();
    }

    public function calculateEverything() {

        $this->timeOffs =  $this->selectedUser->events()->inSelectedMonth($this->selectedDate)->whereEventTheme('5')->count();
        $this->sickDays =  $this->selectedUser->events()->inSelectedMonth($this->selectedDate)->whereEventTheme('6')->count();
        $this->kidsDays =  $this->selectedUser->events()->inSelectedMonth($this->selectedDate)->whereEventTheme('7')->count();
        $this->holidays =  $this->selectedUser->events()->inSelectedMonth($this->selectedDate)->whereEventTheme('12')->count();

        $this->events = $this->selectedUser->events()->inSelectedMonth($this->selectedDate)->get();

        $workingDays = $this->selectedUser->events()->inSelectedMonth($this->selectedDate)
            ->select(['event_start', 'job_id'])
            ->whereNotIn('job_id', [5, 6, 7, 8, 12])
            ->get()
            ->groupBy(function ($event) {
                return \Carbon\Carbon::parse($event->event_start)->format('d.m.Y');
            })
            ->map(function ($workingDays) {
                return $workingDays->count();
        });

        $currentDate = today();
        $workingEvents = $this->selectedUser->events()->inSelectedMonth($this->selectedDate)
                            ->whereNotIn('job_id', [5, 6, 7, 8, 11, 12])
                            ->get();
        $this->workingSeconds = $workingEvents->reduce(function ($total, $event) {
            return $total + $event->event_difference;
        }, 0);

        $this->groupedEvents = $this->events->groupBy("customer_id")
            ->map(fn($events) => $events->sum("event_difference"));

        $this->groupedEventsProject = $this->events->groupBy("project_id")
        ->map(fn($events) => $events->sum("event_difference"));

        $this->totalWorkingDays = $workingDays->count();

        $sum = 0;
        $duration = 0;
        $difference = 0;
        $workingMinutes = 0;
        foreach ($this->events as $event) {
            $startTime = Carbon::parse($event->event_start);
            $sum += $duration;
            if (isset($dates[$startTime->format('d.m.Y')])) {
                array_push($dates[$startTime->format('d.m.Y')], $event);
            }
            if ($event->event_theme != '5' and $event->event_theme != '6' and $event->event_theme != '7' and $event->event_theme != '8' and $event->event_theme != '11') {
                $difference = $event->event_difference;
                $workingMinutes += $difference;
            }
        }
    }

}
