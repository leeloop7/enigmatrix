<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('project_id');
        $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        $table->unsignedBigInteger('report_type_id')->nullable();
        $table->foreign('report_type_id')->references('id')->on('report_types')->onDelete('cascade');
        $table->date('date');
        $table->time('from');
        $table->time('to');
        $table->text('desc');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
