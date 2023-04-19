<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Project;
use App\Models\ReportType;

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
        'from' => 'required',
        'to' => 'required',
        'desc' => 'required',
    ]);

    $report = new Report;
    $report->project_id = $request->project_id;
    $report->report_type_id = $request->report_type_id;
    $report->date = $request->date;
    $report->from = $request->from_minute .':'. $request->from_minute ;
    $report->to = $request->to_minute .':'. $request->to_minute ;
    $report->desc = $request->desc;

    $report->save();

    return redirect('/reports')->with('success', 'Report has been added');
}


    public function index()
    {
        $reports = Report::with('project', 'reportType')->get();
        $projects = Project::all();
        $reportTypes = ReportType::all();

        return view('reports', ['reports' => $reports, 'projects' => $projects, 'reportTypes' => $reportTypes]);
    }
}
