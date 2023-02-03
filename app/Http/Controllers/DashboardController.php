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
        $kidsDays = Auth::user()->events()
        ->whereEventTheme('7')
        ->whereYear('event_start', '=', $currentDate->year)
        ->whereMonth('event_start', '=', $currentDate->month)
        ->count();
        $holidays = Auth::user()->events()
        ->whereEventTheme('12')
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
        $difference = 0;

        $workingEvents = Auth::user()->events()
                            ->whereNotIn('event_theme', [5, 6, 7, 8, 11, 12])
                            ->whereYear('event_start', '=', $currentDate->year)
                            ->whereMonth('event_start', '=', $currentDate->month)
                            ->get();
        $workingSeconds = $workingEvents->reduce(function ($total, $event) {
            return $total + $event->event_difference;
        }, 0);

        foreach (Auth::user()->events as $event) {
            $startTime = Carbon::parse($event->event_start);
            if (isset($dates[$startTime->format('d.m.Y')])) {
                array_push($dates[$startTime->format('d.m.Y')], $event);
            }
        }


        $timeOffsSeconds = $timeOffs * 28800;
        $sickDaysSeconds = $sickDays * 28800;
        $kidsDaysSeconds = $kidsDays * 28800;
        $holidaysSeconds = $holidays * 28800;

        $allHours = ($workingSeconds + $timeOffsSeconds + $sickDaysSeconds) / 3600;

        $workingDays = Auth::user()->events()
            ->select(['event_start', 'job_id'])
            ->where('job_id', '!=', '5')
            ->where('job_id', '!=', '6')
            ->where('job_id', '!=', '7')
            ->where('job_id', '!=', '8')
            ->where('job_id', '!=', '11')
            ->where('job_id', '!=', '12')
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
        $allDays = $totalWorkingDays + $timeOffs + $sickDays + $kidsDays + $holidays;

        if ($allDays != 0) {
            $sickDaysProcents = ($sickDays / $allDays) * 100;
            $totalWorkingDaysProcents = ($totalWorkingDays / $allDays) * 100;
            $timeOffsProcents = ($timeOffs / $allDays) * 100;
            $kidsDaysProcents = ($sickDays / $allDays) * 100;
            $holidaysProcents = ($holidays / $allDays) * 100;
        } else {
            $sickDaysProcents = 0;
            $totalWorkingDaysProcents = 0;
            $timeOffsProcents = 0;
            $kidsDaysProcents = 0;
            $holidaysProcents = 0;
        }


        //VIEW
        return view('dashboard')
            ->with('currentDate', $currentDate)
            ->with('timeOffs', $timeOffs)
            ->with('sickDays', $sickDays)
            ->with('kidsDays', $kidsDays)
            ->with('holidays', $holidays)
            ->with('totalWorkingDays', $totalWorkingDays)
            ->with('workingSeconds', $workingSeconds)
            ->with('timeOffsSeconds', $timeOffsSeconds)
            ->with('sickDaysSeconds', $sickDaysSeconds)
            ->with('sickDaysProcents', $sickDaysProcents)
            ->with('kidsDaysSeconds', $kidsDaysSeconds)
            ->with('kidsDaysProcents', $kidsDaysProcents)
            ->with('holidaysSeconds', $holidaysSeconds)
            ->with('holidaysProcents', $holidaysProcents)
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
