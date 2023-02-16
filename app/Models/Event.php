<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Event extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function jobDesc()
    {
        return $this->belongsTo(JobDesc::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeInSelectedMonth($query, $currentDate) {
        if ($currentDate) {
            $date = Carbon::parse($currentDate);
            return $query->whereYear('event_start', '=', $date->year)->whereMonth('event_start', '=', $date->month);
        }
        return $query;
    }
}
