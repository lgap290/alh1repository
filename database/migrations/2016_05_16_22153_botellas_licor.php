<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BotellasLicor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alc_botellaslicor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('descripcion');
            $table->biginteger('codigo_qr');
            $table->string('marca');
            $table->biginteger('codigo_b');
            $table->integer('n_consultas');
            $table->integer('id_tapa')->unsigned();
            $table->foreign('id_tapa')
                  ->references('id')
                  ->on('alc_tapabotellaslicor')
                  ->onDelete('cascade');
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
        Schema::drop('alc_botellaslicor');
    }
}
