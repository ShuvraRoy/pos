<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_creditos', function (Blueprint $table) {
            $table->increments('idcreditos');
            $table->unsignedInteger('idventa', );
            $table->date('fecha', );
            $table->text('comentarios', );
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
        Schema::dropIfExists('ventas_creditos');
    }
}
