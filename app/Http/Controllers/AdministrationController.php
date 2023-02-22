<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Customer;


class AdministrationController extends Controller
{
    public function administration() {
        $customers = Customer::all();

        return view('administration', [
            'customers' => $customers
        ]);
    }

    public function storeProject(Request $request)
    {
        $customers = Customer::all();

        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'location' => 'required|string|max:255',
            'montage_start' => 'required|date',
            'montage_end' => 'required|date',
            'demontage_start' => 'required|date',
            'demontage_end' => 'required|date',
            'customers' => 'required|array',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->location = $request->location;
        $project->montage_start = $request->montage_start;
        $project->montage_end = $request->montage_end;
        $project->demontage_start = $request->demontage_start;
        $project->demontage_end = $request->demontage_end;

        $project->save();

        $selectedCustomerIds = $request->input('customers');
        $project->customers()->attach($selectedCustomerIds);

        if ($project) {
            return redirect()->route('projects.store')
                ->with('success', 'Project has been created successfully.')
                ->with(compact('customers'));
        } else {
            return redirect()->route('projects.store')
                ->with('error', 'There was an error creating the project.')
                ->with(compact('customers'));
        }
    }
    public function storeCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->save();




        if ($customer) {
            $project = Project::find(99);
            $customer_id = $customer->id;
            $project->customers()->attach($customer_id);

            return redirect()->route('projects.store')
                ->with('success', 'Customer has been added successfully.');
        } else {
            return redirect()->route('projects.store')
                ->with('error', 'There was an error adding the customer.');
        }
    }

}
