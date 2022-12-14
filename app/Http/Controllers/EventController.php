<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Job;
use Carbon\Carbon;

class EventController extends Controller
{
    function store(Request $req)
    {
        // CALENDAR
        $event_date = $req->event_date;

        $event_start = Carbon::parse($event_date)->format('Y-m-d') . ' ' . $req->event_hours_start . ':' . $req->event_minutes_start . ':' . '00';
        $event_end = Carbon::parse($event_date)->format('Y-m-d') . ' ' . $req->event_hours_end . ':' . $req->event_minutes_end . ':' . '00';
        $event_theme = $req->event_theme;
        $event_desc = $req->event_desc;
        if ($req->event_customer != null) {
            $event_customer = $req->event_customer;
        } else {
            $event_customer = 99;
        }
        if ($req->event_jobdesc != null) {
            $event_jobdesc = $req->event_jobdesc;
        } else {
            $event_jobdesc = 0;
        }



        $event = new Event();
        $event->job_id = $event_theme;
        $event->customer_id = $event_customer;
        $event->job_desc_id = $event_jobdesc;
        $event->event_start = $event_start;
        $event->event_end = $event_end;
        $event->event_theme = $event_theme;
        if ($event->event_theme != '5' and $event->event_theme != '6') {
            $event->event_difference = Carbon::parse($event->event_end)->diffInSeconds(Carbon::parse($event->event_start));
        } else {
            $event->event_difference = '28800';
        };
        $event->event_desc = $event_desc;
        $event->user_id = auth()->user()->id;
        $event->save();

        return redirect()->to("/");
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back()->with('success', 'Dogodek izbrisan!');
    }
}
