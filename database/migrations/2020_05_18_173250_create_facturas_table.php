<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->bigIncrements('id_factura');
            $table->bigInteger('id_mobiliaria')->unsigned();
            $table->bigInteger('codigo_pago')->unsigned();
            $table->string('nombre_usuario');
            $table->string('nombre_producto');
            $table->dateTime('fecha_compra');
            $table->bigInteger('cantidad')->unsigned();
            $table->decimal('precio_total');

            $table->foreign('id_mobiliaria')->references('id_mobiliaria')->on('mobiliarias')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
