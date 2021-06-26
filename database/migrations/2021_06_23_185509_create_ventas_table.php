<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('idventas');
            $table->dateTime('fetcha_hora');
            $table->integer('idcliente', )->nullable();
            $table->unsignedInteger('idusuario', );
            $table->integer('descuento', )->nullable();
            $table->string('estatus', 255);
            $table->foreign('idcliente')->references('idclientes')->on('clientes');
            $table->foreign('idusuario')->references('id')->on('users');
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
        Schema::dropIfExists('ventas');
    }
}
