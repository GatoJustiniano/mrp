<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('codigo', 255);
            $table->string('nombre', 255);
            $table->string('imagen', 255);
            $table->string('direccion', 255);
            $table->integer('telefono')->unsigned();
            $table->string('correo', 255);

            $table->integer('id_municipio')->unsigned();
            $table->foreign('id_municipio')->references('id')->on('municipio')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');  

            $table->tinyInteger('estado')->unsigned();
            $table->tinyInteger('eliminado')->unsigned()->default(1);
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
        Schema::dropIfExists('proveedors');
    }
}
