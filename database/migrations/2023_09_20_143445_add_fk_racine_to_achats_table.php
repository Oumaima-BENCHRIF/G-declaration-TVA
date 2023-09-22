<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkRacineToAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_portal')->table('achats', function (Blueprint $table) {
            $table->unsignedBigInteger('FK_racines_20');
            $table->foreign('FK_racines_20')
                ->references('id')->on('racines')
                ->onDelete('restrict')
                ->onUpdate('restrict')->after('FK_racines_14');
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
