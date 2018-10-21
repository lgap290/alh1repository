<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BotellasLicorTapa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alc_tapabotellaslicor', function (Blueprint $table) {
            $table->increments('id');
            $table->biginteger('codigo_qr');
            $table->date_time('fecha_abierta');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alc_tapabotellaslicor');
    }
}
