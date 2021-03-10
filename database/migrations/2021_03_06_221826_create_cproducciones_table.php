<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCproduccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cproducciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('capacidad');
            $table->string('codigo');
            $table->float('costoadicional');
            $table->float('costohora');
            $table->string('descripcion');
            $table->string('estado');
            $table->string('nombre');
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
        Schema::dropIfExists('cproducciones');
    }
}
