<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;

class CustomerDropdown extends Component
{
    public $customerId;

    public function render()
    {
        $customers = Customer::all()->sortBy('name');

        return view('livewire.customer-dropdown', [
            'customers' => $customers,
        ]);
    }
}
