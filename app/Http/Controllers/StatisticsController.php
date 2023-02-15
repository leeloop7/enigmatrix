<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Project;
use App\Models\Customer;
use App\Models\JobDesc;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function statistics() {

        $events = Event::all();
        $customers = Customer::all()->sortBy('name');
        $projects = Project::all();
        $jobDescs = JobDesc::all()->sortBy('name');
        $users = User::all()->sortBy('name');

        $events_time = $events->sum('event_difference');

        $all_hours = $events_time / 3600;

        $jobDescHours = $events
        ->groupBy('job_desc_id')
        ->map(function ($item) {
            return $item->sum('event_difference');
        });

        return view('statistics')
        ->with('customers', $customers)
        ->with('projects', $projects)
        ->with('events_time', $events_time)
        ->with('all_hours',$all_hours)
        ->with('jobDescs',$jobDescs)
        ->with('jobDescHours',$jobDescHours)
        ->with('users',$users)
        ->with('events',$events);
    }

}
