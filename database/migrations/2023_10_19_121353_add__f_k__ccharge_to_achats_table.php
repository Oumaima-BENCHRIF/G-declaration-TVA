<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFKCchargeToAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('achats', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_portal')->table('achats', function (Blueprint $table) {
            $table->unsignedBigInteger('FK_Ccharge');
            $table->foreign('FK_Ccharge')
                ->references('id')
                ->on('compte_charges')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }
}
