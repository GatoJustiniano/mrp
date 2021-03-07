<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_ingreso')->unsigned();
            $table->foreign('id_ingreso')->references('id')->on('ingresos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->bigInteger('id_compra')->unsigned();
            $table->foreign('id_compra')->references('id')->on('compras')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->bigInteger('id_articulo')->unsigned();
            $table->foreign('id_articulo')->references('id')->on('articulos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->integer('cantidad')->unsigned();
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
        Schema::dropIfExists('ingreso_detalles');
    }
}
