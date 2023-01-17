<?php
namespace App\Http\Livewire;
use App\Models\Project;
use App\Models\Customer;
use Livewire\Component;

class Dropdowns extends Component
{
    public $customers;
    public $projects;
    public $selectedCustomer;
    public $selectedProject;

    public function mount()
    {
        $this->customers = Customer::all();
        $this->projects = collect();
    }

    public function render()
    {
        return view('livewire.dropdowns')->extends('layouts.app');
    }

    public function updatedSelectedCustomer($customer)
    {
        if ($customer !== "") {
            $this->projects = Customer::findOrFail($customer)->projects;
        } else {
            $this->projects = collect();
            $this->selectedProject = null;
        }
    }

    public function updatedSelectedProject($project)
    {
        /* */
    }

}
