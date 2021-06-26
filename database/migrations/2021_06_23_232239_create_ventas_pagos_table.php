<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_pagos', function (Blueprint $table) {
            $table->increments('idpagos');
            $table->unsignedInteger('idventa', );
            $table->dateTime('fetcha_hora');
            $table->integer('cantidad', );
            $table->text('comentario', );
            $table->string('metodo',255 );
            $table->foreign('idventa')->references('idventas')->on('ventas')->onUpdate('cascade')
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
        Schema::dropIfExists('ventas_pagos');
    }
}
