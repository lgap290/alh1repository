<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table consultas
        Schema::create('alc_consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_botella')->unsigned();
            $table->string('ciudad');
            $table->string('detalle');
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
        //
        Schema::drop('alc_consultas');
    }
}
