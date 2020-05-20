<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->bigIncrements('id_transport');
            $table->bigInteger('id_mobiliaria')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->string('direccion_usuario');
            $table->dateTime('fecha_recepcion');
            $table->bigInteger('telefono_usuario')->unsigned();
            $table->bigInteger('cantidad')->unsigned();
            $table->boolean('fragil');
            $table->foreign('id_mobiliaria')->references('id_mobiliaria')->on('mobiliarias')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transports');
    }
}
