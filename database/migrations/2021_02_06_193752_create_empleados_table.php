<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('codigo', 255);
            $table->string('cedula', 255);
            $table->string('nombre', 255);
            $table->string('direccion', 255);
            $table->string('email', 255);
            $table->date('fecha_nac');
            $table->integer('telefono')->unsigned();
            $table->string('foto', 255);

            $table->bigInteger('id_departamento')->unsigned();
            $table->foreign('id_departamento')->references('id')->on('departamentos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');  
            
            $table->bigInteger('id_sucursal')->unsigned();
            $table->foreign('id_sucursal')->references('id')->on('sucursals')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); 

            $table->bigInteger('id_cargo')->unsigned();
            $table->foreign('id_cargo')->references('id')->on('cargos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); 

            $table->tinyInteger('estado')->unsigned();
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
        Schema::dropIfExists('empleados');
    }
}
