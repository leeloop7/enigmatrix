<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function reportType()
    {
        return $this->belongsTo(ReportType::class);
    }
    public function outsideWorkers()
    {
        return $this->belongsToMany(OutsideWorker::class);
    }

}
