<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
          
            $table->string('codigo');
            $table->string('nombre');
            $table->tinyinteger('cproduccione')->unsigned();
             
       
        
            $table->float('duracion');
            $table->float('costoduracion');
         
            $table->string('descripcion');
    
            
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
        Schema::dropIfExists('operaciones');
    }
}
