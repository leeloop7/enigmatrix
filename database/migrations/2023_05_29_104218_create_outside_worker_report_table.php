<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutsideWorkerReportTable extends Migration
{
    public function up()
    {
        Schema::create('outside_worker_report', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('outside_worker_id');
            $table->unsignedBigInteger('report_id');
            // Add any additional columns if needed
            $table->timestamps();

            $table->foreign('outside_worker_id')->references('id')->on('outside_workers')->onDelete('cascade');
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('outside_worker_report');
    }
}
