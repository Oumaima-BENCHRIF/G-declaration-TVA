<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_portal')->create('Client', function (Blueprint $table) {
            $table->id();
            $table->longText('nom')->nullable();
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
        Schema::dropIfExists('client');
    }
}
