<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Job;
use App\Models\JobDesc;
use Illuminate\Support\Facades\Auth;

class EventDropdowns extends Component
{

    public $jobs;
    public $event_theme;
    public $jobDescriptions;

    public function mount()
    {
        $this->jobs = Job::all();
        $this->jobDescriptions = JobDesc::whereHas('roles', function ($query) {
            $query->whereIn('roles.id', Auth::user()->roles->pluck('id'));
        })->get();
    }


    public function render()
    {
        return view('livewire.event-dropdowns');
    }
}
