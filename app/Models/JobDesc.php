<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDesc extends Model
{
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
