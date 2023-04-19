<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrimaryKeyToEventsTable extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->primary('id')->autoIncrement();
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropPrimary('events_id_primary');
        });
    }
}
