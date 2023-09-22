<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTauxToAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_portal')->table('achats', function (Blueprint $table) {
            $table->integer('Taux7')->nullable()->after('TVA_7');
            $table->integer('Taux10')->nullable()->after('TVA_10');
            $table->integer('Taux14')->nullable()->after('TVA_14');
            $table->integer('Taux20')->nullable()->after('TVA_20');
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
