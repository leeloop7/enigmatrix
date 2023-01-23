<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model
{
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function projects(){
        return $this->belongsToMany(Project::class);
    }

    public function getTotalHoursAttribute() {
        return $this->events->reduce(function ($total, $event)
        {
            return $total + $event->event_difference;
        }, 0);
    }
}
