<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [

        'numero', 
        'fecha_entrega', 
        'id_cliente', 
        'id_empleado', 
        'id_almacen', 
        'monto_total',
        'observaciones', 
        'estado', 
        'eliminado'
    ];
}
