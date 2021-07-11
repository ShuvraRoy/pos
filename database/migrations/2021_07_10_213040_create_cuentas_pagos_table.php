<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_pagos', function (Blueprint $table) {
            $table->increments('idpagos');
            $table->unsignedInteger('idcuenta' );
            $table->dateTime('fetcha_hora');
            $table->integer('cantidad' );
            $table->text('comentario' );
            $table->foreign('idcuenta')->references('idcuentas')->on('cuentas')->onUpdate('cascade')
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
        Schema::dropIfExists('cuentas_pagos');
    }
}
