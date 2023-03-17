<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class StatisticsController extends Controller
{
    public function statistics()
    {
        $customers = Customer::all()->sortBy('name');

        return view('statistics')
            ->with('customers', $customers);
    }

    public function projectStatistics(Request $request)
    {
        $project = Project::find($request->input('project_id'));

        $events = Event::where('project_id', $project->id)->get();

        $total_time = $events->sum('event_difference');

        $job_desc_hours = $events->groupBy('job_desc_id')->map(function ($item) {
            return $item->sum('event_difference');
        });

        return [
            'project' => $project,
            'total_time' => $total_time,
            'job_desc_hours' => $job_desc_hours
        ];
    }
}

