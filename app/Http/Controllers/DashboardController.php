<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Job;
use App\Models\Project;
use App\Models\JobDesc;
use Illuminate\Http\Request;

use Carbon\Carbon;


class DashboardController extends Controller
{
    public function numbers(Request $request)
    {


        // EVENT THEME
        $jobs = Job::all();

        // EVENT ALL PROJECTS
        $projects = Project::all();

        // EVENT DESC CUSTOMER
        $customers = Customer::all()->sortBy('name');

        // EVENT DESC JOB
        $jobDescriptions = JobDesc::all()->sortBy('name');



        $currentDate = today();

        if($request->has('year')) {
            $currentDate->setYear($request->get('year'));
        }

        if($request->has('month')) {
            $currentDate->setMonth($request->get('month'));
        }

         // EVENT CALCULATIONS
         $timeOffs = Auth::user()->events()
         ->whereEventTheme('5')
         ->whereYear('event_start', '=', $currentDate->year)
         ->whereMonth('event_start', '=', $currentDate->month)
         ->count();
         $sickDays = Auth::user()->events()
         ->whereEventTheme('6')
         ->whereYear('event_start', '=', $currentDate->year)
         ->whereMonth('event_start', '=', $currentDate->month)
         ->count();

        // CALENDAR
        $dates = [];

        for ($i = 0; $i < $currentDate->daysInMonth; ++$i) {
            $date = Carbon::createFromDate($currentDate->year, $currentDate->month, $i + 1)->format('d.m.Y');
            $dates[$date] = [];
        }

        $sum = 0;
        $duration = 0;
        $difference = 0;
        $workingSeconds = 0;
        foreach (Auth::user()->events as $event) {
            $startTime = Carbon::parse($event->event_start);
            $sum += $duration;
            if (isset($dates[$startTime->format('d.m.Y')])) {
                array_push($dates[$startTime->format('d.m.Y')], $event);
            }
            if ($event->event_theme != '5' and $event->event_theme != '6' and $event->event_theme != '7' and $event->event_theme != '8' and $event->event_theme != '11') {
                $difference = $event->event_difference;
                $workingSeconds += $difference;
            }
        }


        $timeOffsSeconds = $timeOffs * 28800;
        $sickDaysSeconds = $sickDays * 28800;

        $allHours = ($workingSeconds + $timeOffsSeconds + $sickDaysSeconds) / 3600;


        $workingDays = Auth::user()->events()
            ->select(['event_start', 'job_id'])
            ->where('job_id', '!=', '5')
            ->where('job_id', '!=', '6')
            ->where('job_id', '!=', '7')
            ->where('job_id', '!=', '8')
            ->where('job_id', '!=', '11')
            ->whereYear('event_start', '=', $currentDate->year)
            ->whereMonth('event_start', '=', $currentDate->month)
            ->get()
            ->groupBy(function ($event) {
                return \Carbon\Carbon::parse($event->event_start)->format('d.m.Y');
            })
            ->map(function ($workingDays) {
                return $workingDays->count();
            });

        $totalWorkingDays = $workingDays->count();
        $allDays = $totalWorkingDays + $timeOffs + $sickDays;

        if ($allDays != 0) {
            $sickDaysProcents = ($sickDays / $allDays) * 100;
            $totalWorkingDaysProcents = ($totalWorkingDays / $allDays) * 100;
            $timeOffsProcents = ($timeOffs / $allDays) * 100;
        } else {
            $sickDaysProcents = 0;
            $totalWorkingDaysProcents = 0;
            $timeOffsProcents = 0;
        }


        //VIEW
        return view('dashboard')
            ->with('currentDate', $currentDate)
            ->with('timeOffs', $timeOffs)
            ->with('sickDays', $sickDays)
            ->with('totalWorkingDays', $totalWorkingDays)
            ->with('workingSeconds', $workingSeconds)
            ->with('timeOffsSeconds', $timeOffsSeconds)
            ->with('sickDaysSeconds', $sickDaysSeconds)
            ->with('sickDaysProcents', $sickDaysProcents)
            ->with('totalWorkingDaysProcents', $totalWorkingDaysProcents)
            ->with('timeOffsProcents', $timeOffsProcents)
            ->with('allHours', $allHours)
            ->with('sum', $sum)
            ->with('difference', $difference)
            ->with('jobs', $jobs)
            ->with('projects', $projects)
            ->with('customers', $customers)
            ->with('jobDescriptions', $jobDescriptions)
            ->with('dates', $dates);
    }

}
