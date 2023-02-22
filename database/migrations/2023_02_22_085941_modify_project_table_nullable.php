<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyProjectTableNullable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dateTime('montage_start')->nullable()->change();
            $table->dateTime('montage_end')->nullable()->change();
            $table->dateTime('demontage_start')->nullable()->change();
            $table->dateTime('demontage_end')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dateTime('montage_start')->nullable()->change();
            $table->dateTime('montage_end')->nullable()->change();
            $table->dateTime('demontage_start')->nullable()->change();
            $table->dateTime('demontage_end')->nullable()->change();
        });
    }
}
