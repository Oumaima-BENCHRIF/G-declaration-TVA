<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTVAdudToAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_portal')->table('achats', function (Blueprint $table) {
            $table->float('TVA_d10')->nullable();
            $table->fkoat('TVA_d14')->nullable();
            $table->fkoat('TVA_d20')->nullable();

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
