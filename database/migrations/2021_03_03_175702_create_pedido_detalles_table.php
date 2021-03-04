<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_pedido')->unsigned();
            $table->foreign('id_pedido')->references('id')->on('pedidos')
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
        Schema::dropIfExists('pedido_detalles');
    }
}
