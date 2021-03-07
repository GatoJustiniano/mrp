<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('numero')->unsigned();
            $table->date('fecha_entrega');

            $table->bigInteger('id_proveedor')->unsigned();
            $table->foreign('id_proveedor')->references('id')->on('proveedors')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->bigInteger('id_empleado')->unsigned();
            $table->foreign('id_empleado')->references('id')->on('empleados')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); 

            $table->bigInteger('id_almacen')->unsigned();
            $table->foreign('id_almacen')->references('id')->on('almacens')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                   
            $table->float('monto_total');

            $table->tinyInteger('estado')->unsigned();
            $table->tinyInteger('eliminado')->unsigned();
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
        Schema::dropIfExists('compras');
    }
}
