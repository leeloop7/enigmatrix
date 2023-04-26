<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Project;
use App\Models\ReportType;
use Carbon\Carbon;

class ReportsController extends Controller
{
    /**
     * Invoke the controller
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required',
            'report_type_id' => 'required',
            'date' => 'required|date',
            'from_hour' => 'required',
            'from_minute' => 'required',
            'to_hour' => 'required',
            'to_minute' => 'required',
            'desc' => 'required',
        ]);

        $report = new Report;
        $report->project_id = $request->project_id;
        $report->report_type_id = $request->report_type_id;
        $report->date = $request->date;
        $report->from = Carbon::createFromTime($request->from_hour, $request->from_minute);
        $report->to = Carbon::createFromTime($request->to_hour, $request->to_minute);
        $report->desc = $request->desc;

        $report->save();

        return redirect('/reports')->with('success', 'Report has been added');
    }

    public function create(Project $project)
    {
        $projects = Project::all();
        $reportTypes = ReportType::all();

        return view('reports.create', ['projects' => $projects, 'reportTypes' => $reportTypes]);
    }

    public function show(Project $project)
{
    $reports = $project->reports()->with('project', 'reportType')->get();
    $reportTypes = ReportType::all();
    return view('reports.show', ['reports' => $reports, 'project' => $project, 'reportTypes' => $reportTypes]);
}


    public function index()
    {
        $reports = Report::with('project', 'reportType')->get();
        $projects = Project::all();
        $reportTypes = ReportType::all();

        return view('reports', ['reports' => $reports, 'projects' => $projects, 'reportTypes' => $reportTypes]);
    }
}
