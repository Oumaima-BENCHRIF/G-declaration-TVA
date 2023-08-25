<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdsuccursaleToFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_portal')->table('fournisseurs', function (Blueprint $table) {
            $table->unsignedBigInteger('FK_succursale');
            $table->foreign('FK_succursale')
                ->references('id')
                ->on('succursales')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_portal')->table('fournisseurs', function (Blueprint $table) {
            //
        });
    }
}
