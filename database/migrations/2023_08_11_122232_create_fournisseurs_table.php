<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_portal')->create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->integer('Num_compte_comptable')->nullable();
            $table->longText('ID_fiscale')->nullable();
            $table->longText('Fax')->nullable();
            $table->longText('NICE')->nullable();
            $table->longText('ville')->nullable();
            $table->longText('telephone')->nullable();
            $table->longText('Adresse')->nullable();
            $table->longText('Designation')->nullable();

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
        Schema::connection('mysql_portal')->dropIfExists('fournisseurs');
    }
}
