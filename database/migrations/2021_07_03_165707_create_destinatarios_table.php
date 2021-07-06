<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinatariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinatarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idventa' );
            $table->string('nombre', 255)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->dateTime('fetcha_hora');
            $table->text('referencia')->nullable();
            $table->text('mensaje')->nullable();
            $table->string('colonia', 255)->nullable();
            $table->string('codigopostal', 255)->nullable();
            $table->string('commentarios', 255)->nullable();
            $table->foreign('idventa')->references('idventas')->on('ventas');
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
        Schema::dropIfExists('destinatarios');
    }
}
