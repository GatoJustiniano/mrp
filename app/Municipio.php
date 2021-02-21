<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table='municipio';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
    	'codigo',
    	'nombre',
        'id_provincia',
    	'estado'
    ];

    protected $guarded =[

    ];
}
