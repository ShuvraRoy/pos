<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('idservicios');
            $table->dateTime('fecha_hora');
            $table->integer('idcliente', )->nullable();
            $table->unsignedInteger('idusuario' );
            $table->integer('descuento' )->nullable();
            $table->string('estatus', 255);
            $table->string('po', 255)->nullable();
            $table->foreign('idcliente')->references('idclientes')->on('clientes')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idusuario')->references('id')->on('users')->onUpdate('cascade')
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
        Schema::dropIfExists('table_servicios');
    }
}
