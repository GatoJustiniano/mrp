<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nombre', 255);
            $table->string('cargo', 255);
            $table->integer('telefono')->unsigned();
            $table->integer('celular')->unsigned();
            $table->string('correo', 255);
            $table->string('nota', 255);

            $table->bigInteger('id_proveedor')->unsigned();
            $table->foreign('id_proveedor')->references('id')->on('proveedors')
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
        Schema::dropIfExists('contactos');
    }
}
