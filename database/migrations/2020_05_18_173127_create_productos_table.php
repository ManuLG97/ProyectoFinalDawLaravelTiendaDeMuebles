<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id_producto');
            $table->bigInteger('id_usuario')->unsigned();
            $table->string('nombre_producto');
            $table->string('marca');
            $table->string('tipo_mueble');
            $table->string('descripcion');
            $table->double('dimensiones',3,2);
            $table->double('volum',3,2);
            $table->boolean('oferta');
            $table->bigInteger('cantidad')->unsigned();
            $table->decimal('precion_sin_montaje',8,2);
            $table->decimal('precion_con_montaje',8,2);
            $table->boolean('fragil');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('productos');
    }
}
