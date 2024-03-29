<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutsideWorker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone_number',
        'address',
        'city',
        'state',
        'company',
    ];

    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }

}
