<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Project;
use App\Models\Customer;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function statistics() {

        $events = Event::all();
        $customers = Customer::all()->sortBy('name');
        $projects = Project::all();

        $events_time = $events->sum('event_difference');

        $all_hours = $events_time / 3600;

        return view('statistics')
        ->with('customers', $customers)
        ->with('projects', $projects)
        ->with('events_time', $events_time)
        ->with('all_hours',$all_hours)
        ->with('events',$events);
    }

}
