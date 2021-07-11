<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableServiciosArticulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_articulos', function (Blueprint $table) {
            $table->increments('idsa');
            $table->unsignedInteger('idservicio');
            $table->integer('idarticulo');
            $table->integer('precio');
            $table->integer('cantidad' );
            $table->integer('total', );
            $table->foreign('idservicio')->references('idservicios')->on('servicios')->onUpdate('cascade')
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
        Schema::dropIfExists('table_servicios_articulos');
    }
}
