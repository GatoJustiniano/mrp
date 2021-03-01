<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('codigo', 255);
            $table->string('identificacion', 255);
            $table->string('nombre', 255);
            $table->string('imagen', 255);
            $table->integer('telefono')->unsigned();
            $table->integer('celular')->unsigned();
            $table->string('correo', 255);
            $table->string('direccion', 255);

            $table->integer('id_municipio')->unsigned();
            $table->foreign('id_municipio')->references('id')->on('municipio')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');  

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
        Schema::dropIfExists('clientes');
    }
}
