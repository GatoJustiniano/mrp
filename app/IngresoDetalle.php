<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngresoDetalle extends Model
{
    protected $fillable = [

        'id_ingreso', 
        'id_compra', 
        'id_articulo', 
        'cantidad', 
        'descuento'
    ];
}
