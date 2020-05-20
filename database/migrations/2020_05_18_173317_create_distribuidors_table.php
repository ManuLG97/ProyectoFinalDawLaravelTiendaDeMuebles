<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribuidorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribuidors', function (Blueprint $table) {
            $table->bigIncrements('id_distribuidor');
            $table->bigInteger('id_mobiliaria')->unsigned();
            $table->string('nombre_distibuidor');
            $table->string('email');
            $table->bigInteger('telefono')->unsigned();
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
        Schema::dropIfExists('distribuidors');
    }
}
