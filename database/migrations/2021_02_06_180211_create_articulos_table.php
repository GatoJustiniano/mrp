<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('cantidad_minima');
            $table->string('codigo');
            $table->string('nombre');
            $table->boolean('eliminado')->default(false);

            $table->string('imagen');
            $table->float('precio_compra');
            $table->float('precio_venta');
            //Fk
            $table->unsignedBigInteger('tipo');
            //FK
            $table->unsignedBigInteger('sub_categoria_id');
            $table->foreign('sub_categoria_id')->references('id')->on('sub_categorias');
            //FK
            $table->unsignedBigInteger('unidad_medida_id');
            $table->foreign('unidad_medida_id')->references('id')->on('unidad_medidas');
            //FK
            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedors');

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
        Schema::dropIfExists('articulos');
    }
}
