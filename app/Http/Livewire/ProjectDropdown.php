<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Project;
use Livewire\Component;

class ProjectDropdown extends Component
{
    public $customerId;
    public $projectId;

    // ProjectDropdown.php
public function render()
{
    $customers = Customer::all()->sortBy('name');
    $projects = $this->customerId
        ? Project::whereHas('customers', function ($query) {
            $query->where('customer_id', $this->customerId);
        })->get()
        : collect();

    return view('livewire.project-dropdown', [
        'customers' => $customers,
        'projects' => $projects,
    ]);
}

}
