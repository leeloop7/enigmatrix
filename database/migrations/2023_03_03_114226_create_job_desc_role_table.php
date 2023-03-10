<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobDescRoleTable extends Migration
{
    public function up()
    {
        Schema::create('job_desc_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_desc_id')->constrained()->onDelete('cascade');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_desc_role');
    }
}
