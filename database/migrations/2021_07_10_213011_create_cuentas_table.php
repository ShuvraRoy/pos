<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->increments('idcuentas');
            $table->dateTime('fetcha_hora');
            $table->unsignedInteger('idproveedor' );
            $table->integer('cantidad' );
            $table->string('importe' );
            $table->text('comentarios' )->nullable();
            $table->foreign('idproveedor')->references('idproveedores')->on('proveedores')->onUpdate('cascade')
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
        Schema::dropIfExists('cuentas');
    }
}
