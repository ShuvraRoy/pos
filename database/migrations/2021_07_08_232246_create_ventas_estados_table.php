<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_estados', function (Blueprint $table) {
            $table->increments('idestados');
            $table->unsignedInteger('idventa' );
            $table->dateTime('fetcha_hora');
            $table->string('estado', 255);
            $table->text('commentarios')->nullable();
            $table->foreign('idventa')->references('idventas')->on('ventas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas_estados');
    }
}
