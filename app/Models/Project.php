<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Project extends Model
{

    protected $appends = ['length'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function reports()
{
    return $this->hasMany(Report::class);
}

    public function getLengthAttribute()
    {
        $ending = Carbon::parse($this->end_date);
        $starting = Carbon::parse($this->start_date);
        return $ending->diffInDays($starting);
    }
    public function getMontageAttribute()
    {
        $ending = Carbon::parse($this->montage_end);
        $starting = Carbon::parse($this->montage_start);
        return $ending->diffInDays($starting);
    }
    public function getDemontageAttribute()
    {
        $ending = Carbon::parse($this->demontage_end);
        $starting = Carbon::parse($this->demontage_start);
        return $ending->diffInDays($starting);
    }

    public function getTotalHoursAttribute() {
        return $this->events->reduce(function ($total, $event)
        {
            return $total + $event->event_difference;
        }, 0);
    }
}
