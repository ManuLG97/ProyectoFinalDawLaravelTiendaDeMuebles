<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobiliariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobiliarias', function (Blueprint $table) {
            $table->bigIncrements('id_mobiliaria');
            $table->bigInteger('id_producto')->unsigned();
            $table->bigInteger('id_distribuidor')->unsigned();
            $table->string('nombre_mobiliaria');
            $table->string('adresa');
            $table->bigInteger('telefono')->unsigned();
            $table->string('email');
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobiliarias');
    }
}
