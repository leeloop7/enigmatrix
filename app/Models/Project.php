<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Project extends Model
{

    protected $appends = ['length'];

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function getLengthAttribute()
    {
        $ending = Carbon::parse($this->end_date);
        $starting = Carbon::parse($this->start_date);
        return $ending->diffInDays($starting);
    }
}
