<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_portal')->create('Vente', function (Blueprint $table) {
            $table->id();
            $table->longText('N_facture')->nullable();
            $table->date('Date_facture')->nullable();
            $table->date('Date_payment')->nullable();
            $table->longText('Designation')->nullable();
            $table->longText('TVA_7')->nullable();
            $table->longText('TVA_10')->nullable();
            $table->longText('TVA_14')->nullable();
            $table->longText('TVA_20')->nullable();
            $table->longText('M_HT_7')->nullable();
            $table->longText('M_HT_10')->nullable();
            $table->longText('M_HT_14')->nullable();
            $table->longText('M_HT_20')->nullable();
            $table->float('TTC_7')->nullable();
            $table->float('TTC_10')->nullable();
            $table->float('TTC_14')->nullable();
            $table->float('TTC_20')->nullable();
            $table->longText('M_TTC')->nullable();
            $table->longText('Exercice')->nullable();
            $table->unsignedBigInteger('FK_racines_7');
            $table->foreign('FK_racines_7')
                ->references('id')->on('racines')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->unsignedBigInteger('FK_racines_10');
            $table->foreign('FK_racines_10')
                ->references('id')->on('racines')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->unsignedBigInteger('FK_racines_14');
            $table->foreign('FK_racines_14')
                ->references('id')->on('racines')
                ->onDelete('restrict')
                ->onUpdate('restrict');

                $table->unsignedBigInteger('FK_racines_20');
                $table->foreign('FK_racines_20')
                    ->references('id')->on('racines')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

           $table->unsignedBigInteger('FK_type_payment');
            $table->foreign('FK_type_payment')
                ->references('id')->on('type_payments')
                ->onDelete('restrict')
                ->onUpdate('restrict');

                $table->unsignedBigInteger('FK_regime');
                $table->foreign('FK_regime')
                    ->references('id')->on('regimes')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
    
                    $table->unsignedBigInteger('FK_Client');
                    $table->foreign('FK_Client')
                        ->references('id')
                        ->on('Client')
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
        Schema::dropIfExists('Vente');
    }
}
