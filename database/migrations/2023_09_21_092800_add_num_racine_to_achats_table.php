<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumRacineToAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_portal')->table('achats', function (Blueprint $table) {
            $table->string('num_racine_7')->nullable();
            $table->string('num_racine_10')->nullable();
            $table->string('num_racine_14')->nullable();
            $table->string('num_racine_20')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('achats', function (Blueprint $table) {
            //
        });
    }
}
