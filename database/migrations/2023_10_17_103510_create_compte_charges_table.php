<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::connection('mysql_portal')->create('compte_charges', function (Blueprint $table) {
            $table->id();
            $table->longText('N_compte_charges_immob')->nullable();
            $table->longText('Intitule')->nullable();
            
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
       Schema::connection('mysql_portal')->dropIfExists('compte_charges');
    }
}
