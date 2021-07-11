<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_pagos', function (Blueprint $table) {
            $table->increments('idpagos');
            $table->unsignedInteger('idservicio' );
            $table->dateTime('fetcha_hora');
            $table->integer('cantidad' );
            $table->text('comentario' );
            $table->string('metodo',255 );
            $table->foreign('idservicio')->references('idservicios')->on('servicios')->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios_pagos');
    }
}
