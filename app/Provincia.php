<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table='provincia';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
    	'codigo',
    	'nombre',
        'id_estado',
    	'estado'
    ];

    protected $guarded =[

    ];
}
