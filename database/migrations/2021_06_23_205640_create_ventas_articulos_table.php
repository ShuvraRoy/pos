<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_articulos', function (Blueprint $table) {
            $table->increments('idva');
            $table->unsignedInteger('idventa', );
            $table->integer('idarticulo', );
            $table->integer('precio', );
            $table->integer('cantidad', );
            $table->integer('total', );
            $table->foreign('idventa')->references('idventas')->on('ventas')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idarticulo')->references('idarticulos')->on('articulos')->onUpdate('cascade')
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
        Schema::dropIfExists('ventas_articulos');
    }
}
