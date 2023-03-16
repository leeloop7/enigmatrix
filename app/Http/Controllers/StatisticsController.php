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
    public function statistics()
    {
        $projects = Project::all();

        return view('statistics')
            ->with('projects', $projects);
    }
    public function projectStatistics(Request $request)
    {
        $project = Project::find($request->input('project_id'));
        $events = Event::where('project_id', $project->id)->get();
        $total_time = $events->sum('event_difference');

        $job_desc_hours = $events->groupBy('job_desc_id')->map(function ($item) {
            return $item->sum('event_difference');
        });

        return view('statistics', [
            'project' => $project,
            'total_time' => $total_time,
            'job_desc_hours' => $job_desc_hours
        ]);
    }
}
