<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Project;
use App\Models\Event;
use Livewire\Component;

class ProjectDropdown extends Component
{
    public $customerId;
    public $projectId;
    public $selectedProject;

    public function render()
    {
        $customers = Customer::all()->sortBy('name');

        $projects = $this->customerId
            ? Project::whereHas('customers', function ($query) {
                $query->where('customer_id', $this->customerId);
            })->get()
            : collect();

        $total_time = null;
        $away_time = null;
        $montage_time = null;
        $demontage_time = null;

        if ($this->selectedProject) {
            $total_time = Event::where('project_id', $this->selectedProject->id)
                ->whereHas('job', function ($query) {
                    $query->where('id', 1);
                })
                ->sum('event_difference');

            $away_time = Event::where('project_id', $this->selectedProject->id)
                ->whereHas('job', function ($query) {
                    $query->where('id', 10);
                })
                ->sum('event_difference');

            $montage_time = Event::where('project_id', $this->selectedProject->id)
                ->whereHas('job', function ($query) {
                    $query->where('id', 1);
                })
                ->where('job_desc_id', 5)
                ->sum('event_difference');

            $demontage_time = Event::where('project_id', $this->selectedProject->id)
                ->whereHas('job', function ($query) {
                    $query->where('id', 1);
                })
                ->where('job_desc_id', 6)
                ->sum('event_difference');
        }

        return view('livewire.project-dropdown', [
            'customers' => $customers,
            'projects' => $projects,
            'total_time' => $total_time,
            'away_time' => $away_time,
            'montage_time' => $montage_time,
            'demontage_time' => $demontage_time,
        ]);
    }

    public function updatedCustomerId($value) {
        $this->selectedProject = null;
    }

    public function updatedProjectId($value) {
        if ($value) {
            $this->selectedProject = Project::findOrFail($value);
        }
    }

}
