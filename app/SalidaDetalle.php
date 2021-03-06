<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalidaDetalle extends Model
{
    protected $fillable = [

        'id_salida', 
        'id_venta', 
        'id_articulo', 
        'cantidad', 
        'descuento'
    ];
}
