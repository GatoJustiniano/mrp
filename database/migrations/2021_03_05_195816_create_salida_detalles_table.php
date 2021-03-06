<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_salida')->unsigned();
            $table->foreign('id_salida')->references('id')->on('salidas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->bigInteger('id_venta')->unsigned();
            $table->foreign('id_venta')->references('id')->on('ventas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->bigInteger('id_articulo')->unsigned();
            $table->foreign('id_articulo')->references('id')->on('articulos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->integer('cantidad')->unsigned();
            $table->integer('descuento')->default(0);

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
        Schema::dropIfExists('salida_detalles');
    }
}
