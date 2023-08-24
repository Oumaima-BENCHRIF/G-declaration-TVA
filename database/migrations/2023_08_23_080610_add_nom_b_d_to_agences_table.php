<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNomBDToAgencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_portal')->table('agences', function (Blueprint $table) {
            $table->string('nomBD');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_portal')->table('agences', function (Blueprint $table) {
            //
            $table->dropColumn('nomBD');
        });
    }
}
