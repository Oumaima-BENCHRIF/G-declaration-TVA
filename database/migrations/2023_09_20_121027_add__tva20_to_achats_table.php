<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTva20ToAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_portal')->table('achats', function (Blueprint $table) {
            $table->string('TVA_20')->nullable()->after('TVA_14');
            $table->string('M_HT_20')->nullable()->after('M_HT_7');
            $table->string('TTC_20')->nullable()->after('TTC_14');
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
