<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMTDidToAchatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mys
        ql_portal')->table('achats', function (Blueprint $table) {
            $table->float('MT_déduit')->nullable();
            $table->float('TTC_1')->nullable();
            $table->float('TTC_2')->nullable();
            $table->float('TTC_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('achat', function (Blueprint $table) {
            //
        });
    }
}
