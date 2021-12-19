<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStreakColumnToHabitsTable extends Migration
{
    public function up()
    {
        Schema::table('habits', function (Blueprint $table) {
            $table->integer('streak')->after('target')->default(0);
        });
    }

    public function down()
    {
        Schema::table('habits', function (Blueprint $table) {
            $table->dropColumn(['streak']);
        });
    }
}
