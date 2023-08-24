<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_portal')->create('agences', function (Blueprint $table) {
            $table->id();
            $table->longText('nom_succorsale')->nullable();
            $table->longText('ICE')->nullable();
            $table->longText('Email')->nullable();
            $table->longText('Activite')->nullable();
            $table->longText('ID_Fiscale')->nullable();
            $table->longText('Ville')->nullable();
            $table->longText('Tele')->nullable();
            $table->longText('Adresse')->nullable();
            $table->longText('Fax')->nullable();

            $table->unsignedBigInteger('FK_Regime');
            $table->foreign('FK_Regime')
                ->references('id')
                ->on('regimes')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->unsignedBigInteger('FK_fait_generateurs');
            $table->foreign('FK_fait_generateurs')
                ->references('id')->on('fait_generateurs')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_portal')->dropIfExists('agences');
    }
}
