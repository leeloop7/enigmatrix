<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Event;

class StatisticsController extends Controller
{
    public function statistics(Project $selectedProject = null)
    {
        $customers = Customer::all()->sortBy('name');
        $events = [];

        if ($selectedProject) {
            $events = Event::where('project_id', $selectedProject->id)->get();
        }

        return view('statistics', compact('customers', 'selectedProject', 'events'));
    }

    public function projectStatistics(Project $project)
    {
        return view("project-statistics")->with(compact("project"));
    }
}
