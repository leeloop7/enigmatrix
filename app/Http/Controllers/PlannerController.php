<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\CarbonPeriod;
use Carbon\Carbon;
use App\Models\Project;

class PlannerController extends Controller
{
    public function plans()
    {
        $from = '2023-01-01';
        $to = '2023-12-31';
        $months = CarbonPeriod::create($from, '1 month', $to);

        $calendar = [];

        foreach($months as $month) {
            $calendar[$month->format("m")] = []; // Dneve dobiš iz Carbon period za days tko k si mislu sm pač sformatirat moraš
            $start = Carbon::parse($month)->startOfMonth();
            $end = Carbon::parse($month)->endOfMonth();
            $days = CarbonPeriod::create($start, $end);
            foreach($days as $day) {
                $calendar[$month->format("m")][] = $day;
            }
        }

        $date = "2023-01-01 01:00:00";

        $diff = now()->diffInDays(Carbon::parse($date));

        $projects = Project::all();

        return view('planner')
            ->with('projects', $projects)
            ->with('diff', $diff)
            ->with('calendar', $calendar)
            ->with('months', $months);
    }
}
