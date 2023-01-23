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
        Schema::table('projects', function (Blueprint $table) {
            $table->datetime('montage_start')->default('2023-01-22 14:00:00');
            $table->datetime('montage_end')->default('2023-01-22 14:00:00');
            $table->datetime('demontage_start')->default('2023-01-22 14:00:00');
            $table->datetime('demontage_end')->default('2023-01-22 14:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('montage_start');
            $table->dropColumn('montage_end');
            $table->dropColumn('demontage_start');
            $table->dropColumn('demontage_end');
        });
    }
};
