<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutsideWorkersTable extends Migration
{
    public function up()
    {
        Schema::create('outside_workers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('company');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('outside_workers');
    }
}

