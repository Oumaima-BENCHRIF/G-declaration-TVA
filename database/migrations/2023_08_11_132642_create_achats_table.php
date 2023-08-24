<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_portal')->create('achats', function (Blueprint $table) {
            $table->id();
            $table->longText('N_facture')->nullable();
            $table->date('Date_facture')->nullable();
            $table->date('Date_payment')->nullable();
            $table->longText('Designation')->nullable();
            $table->longText('TVA_1')->nullable();
            $table->longText('TVA_2')->nullable();
            $table->longText('TVA_3')->nullable();
            $table->longText('M_HT_1')->nullable();
            $table->longText('M_HT_2')->nullable();
            $table->longText('M_HT_3')->nullable();
            $table->longText('M_TTC')->nullable();
            $table->longText('Prorata')->nullable();
            $table->longText('TVA_deductible')->nullable();

            $table->unsignedBigInteger('FK_fournisseur');
            $table->foreign('FK_fournisseur')
                ->references('id')
                ->on('fournisseurs')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->unsignedBigInteger('FK_racines_1');
            $table->foreign('FK_racines_1')
                ->references('id')->on('racines')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->unsignedBigInteger('FK_racines_2');
            $table->foreign('FK_racines_2')
                ->references('id')->on('racines')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->unsignedBigInteger('FK_racines_3');
            $table->foreign('FK_racines_3')
                ->references('id')->on('racines')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->unsignedBigInteger('FK_type_payment');
            $table->foreign('FK_type_payment')
                ->references('id')->on('type_payments')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->unsignedBigInteger('FK_succursale');
            $table->foreign('FK_succursale')
                ->references('id')->on('succursales')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->unsignedBigInteger('FK_regime');
            $table->foreign('FK_regime')
                ->references('id')->on('regimes')
                ->onDelete('restrict')
                ->onUpdate('restrict');


            $table->unsignedBigInteger('FK_fait_generateur');
            $table->foreign('FK_fait_generateur')
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
        Schema::connection('mysql_portal')->dropIfExists('achats');
    }
}