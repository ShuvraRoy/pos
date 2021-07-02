<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('idproveedores');
            $table->string('nombre',255 );
            $table->string('correo',255 )->nullable();
            $table->string('domicilio',255 )->nullable();
            $table->string('colonia',255 )->nullable();
            $table->string('codigopostal',255 )->nullable();
            $table->string('telefono',255 )->nullable();
            $table->string('rfc',255 )->nullable();
            $table->string('estado',255 )->nullable();
            $table->string('pais',255 )->nullable();
            $table->string('contacto',255 )->nullable();

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
        Schema::dropIfExists('proveedores');
    }
}
