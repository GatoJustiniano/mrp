<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $fillable = [

        'codigo',
        'costo_total',
        'duracion_total',
        'nombre',
        'id_articulo',
        'eliminado'
    ];
}
