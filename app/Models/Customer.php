<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function events()
    {
        return $this->hasMany(Event::class);

    }

    public function projects(){
        return $this->belongsToMany(Project::class);
    }
}
