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
        $home_time = null;
        $away_time = null;
        $montage_time = null;
        $demontage_time = null;
        $driving_time = null;
        $waiting_time = null;
        $regal_time = null;
        $packing_time = null;
        $servis_time = null;
        $inventura_time = null;
        $razvoj_time = null;
        $cleaning_time = null;
        $technical_time = null;
        $rest_time = null;
        $comercial_time = null;
        $design_time = null;
        $analitic_time = null;
        $planing_time = null;
        $research_time = null;
        $coordination_time = null;
        $meeting_time = null;
        $study_time = null;
        $administration_time = null;
        $restout_time = null;

        if ($this->selectedProject) {

            // PODBREZNIK
            $total_time = Event::where('project_id', $this->selectedProject->id)
                ->whereHas('job', function ($query) {
                    $query->where('id', 1);
                });

            if ($this->selectedCustomer) {
                $total_time->where('customer_id', $this->selectedCustomer->id);
            }

            $total_time = $total_time->sum('event_difference');

            $home_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 9);
            })
            ->sum('event_difference');

            $packing_time = Event::where('project_id', $this->selectedProject->id)
                ->whereHas('job', function ($query) {
                    $query->where('id', 1);
                })
                ->where('job_desc_id', 105)
                ->sum('event_difference');

                $regal_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 106)
            ->sum('event_difference');

            $servis_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 107)
            ->sum('event_difference');

            $inventura_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 108)
            ->sum('event_difference');

            $razvoj_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 109)
            ->sum('event_difference');

            $cleaning_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 110)
            ->sum('event_difference');

            $technical_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 111)
            ->sum('event_difference');

            $rest_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 1001)
            ->sum('event_difference');

            $comercial_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 1002)
            ->sum('event_difference');

            $design_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 1003)
            ->sum('event_difference');

            $analitic_time = $administration_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 1004)
            ->sum('event_difference');

            $planing_time = $administration_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 1005)
            ->sum('event_difference');

            $research_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 1006)
            ->sum('event_difference');

            $coordination_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 1007)
            ->sum('event_difference');

            $meeting_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 1008)
            ->sum('event_difference');

            $study_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 1009)
            ->sum('event_difference');

            $administration_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 1);
            })
            ->where('job_desc_id', 1010)
            ->sum('event_difference');

            // TEREN !!!

            $away_time = Event::where('project_id', $this->selectedProject->id)
                ->whereHas('job', function ($query) {
                    $query->where('id', 10);
                })
                ->sum('event_difference');

            $montage_time = Event::where('project_id', $this->selectedProject->id)
                ->whereHas('job', function ($query) {
                    $query->where('id', 10);
                })
                ->where('job_desc_id', 102)
                ->sum('event_difference');


            $demontage_time = Event::where('project_id', $this->selectedProject->id)
                ->whereHas('job', function ($query) {
                    $query->where('id', 10);
                })
                ->where('job_desc_id', 103)
                ->sum('event_difference');

            $driving_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 10);
            })
            ->where('job_desc_id', 101)
            ->sum('event_difference');

            $waiting_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 10);
            })
            ->where('job_desc_id', 104)
            ->sum('event_difference');

            $restout_time = Event::where('project_id', $this->selectedProject->id)
            ->whereHas('job', function ($query) {
                $query->where('id', 10);
            })
            ->where('job_desc_id', 1001)
            ->sum('event_difference');
        }

        return view('livewire.project-dropdown', [
            'customers' => $customers,
            'projects' => $projects,
            'total_time' => $total_time,
            'home_time' => $home_time,
            'away_time' => $away_time,
            'montage_time' => $montage_time,
            'demontage_time' => $demontage_time,
            'driving_time' => $driving_time,
            'waiting_time' => $waiting_time,
            'regal_time' => $regal_time,
            'packing_time' => $packing_time,
            'servis_time' => $servis_time,
            'inventura_time' => $inventura_time,
            'razvoj_time' => $razvoj_time,
            'cleaning_time' => $cleaning_time,
            'technical_time' => $technical_time,
            'rest_time' => $rest_time,
            'comercial_time' => $comercial_time,
            'design_time' => $design_time,
            'analitic_time' => $analitic_time,
            'planing_time' => $planing_time,
            'research_time' => $research_time,
            'coordination_time' => $coordination_time,
            'meeting_time' => $meeting_time,
            'study_time' => $study_time,
            'administration_time' => $administration_time,
            'restout_time' => $restout_time,
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
