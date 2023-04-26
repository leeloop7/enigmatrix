<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Event;
use App\Models\Job;
use App\Models\JobDesc;
use App\Models\Customer;
use App\Models\Project;
use Carbon\Carbon;

class EventController extends Controller
{
    function store(Request $req)
    {
        // CALENDAR
        $event_date = $req->event_date;

        $event_start = Carbon::parse($event_date)->format('Y-m-d') . ' ' . str_pad($req->event_hours_start, 2, "0", STR_PAD_LEFT) . ':' . str_pad($req->event_minutes_start, 2, "0", STR_PAD_LEFT) . ':' . '00';
        $event_end = Carbon::parse($event_date)->format('Y-m-d') . ' ' . $req->event_hours_end . ':' . $req->event_minutes_end . ':' . '00';
        $event_theme = $req->event_theme;
        $event_desc = $req->event_desc;
        if ($req->event_jobdesc != null) {
            $event_project = $req->event_project;
        } else {
            $event_project = 99;
        }
        if ($req->event_customer != null) {
            $event_customer = $req->event_customer;
        } else {
            $event_customer = 99;
        }
        if ($req->event_jobdesc != null) {
            $event_jobdesc = $req->event_jobdesc;
        } else {
            $event_jobdesc = 99;
        }



        $event = new Event();
        $event->job_id = $event_theme;
        $event->customer_id = $event_customer;
        $event->job_desc_id = $event_jobdesc;
        $event->project_id = $event_project;
        $event->event_start = $event_start;
        $event->event_end = $event_end;
        $event->event_theme = $event_theme;
        if ($event->event_theme != '5' and $event->event_theme != '6') {
            $start = Carbon::parse($event->event_start);
            $end = Carbon::parse($event->event_end);
            if ($end->format('H:i:s') === '00:00:00') {
                // if end time is 00:00:00, set it to 24:00:00 of the same day
                $end->setTime(24, 0, 0);
            }
            $event->event_difference = $end->diffInSeconds($start);

        } else {
            $event->event_difference = '28800';
        };
        $event->event_desc = $event_desc;
        $event->user_id = auth()->user()->id;
        $event->save();

        return redirect()->back();
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back()->with('success', 'Dogodek izbrisan!');
    }

    public function edit(Event $event)
    {
        $jobs = Job::all();
        $customers = Customer::all();
        $job_descs = JobDesc::all();
        $projects = Project::all();

        return view('dashboard.edit-event', compact('event', 'jobs', 'customers', 'job_descs', 'projects'));
    }

    public function update(Request $request, Event $event)
    {

        $oldEventStart = $event->event_start;
        $oldEventStartDate = \Carbon\Carbon::parse($oldEventStart)->toDateString();

        $event->job_id = $request->job_id;
        $event->job_desc_id = $request->job_desc_id;
        $event->project_id = $request->project_id;
        $event->customer_id = $request->customer_id;
        $event->event_desc = $request->event_description;
        $event_start = Carbon::parse($event_date)->format('Y-m-d') . ' ' . str_pad($req->event_hours_start, 2, "0", STR_PAD_LEFT) . ':' . str_pad($req->event_minutes_start, 2, "0", STR_PAD_LEFT) . ':' . '00';

        $event->event_start = $eventStart;
        $eventEnd = Carbon::createFromFormat('Y-m-d H:i:s', $oldEventStartDate.' '.$request->event_hours_end.':'.$request->event_minutes_end.':00');
        $event->event_end = $eventEnd;

        $eventDifference = $eventEnd->diffInSeconds($eventStart);
        $event->event_difference = $eventDifference;

        $event->save();

        return redirect()->route('home');

    }

}
