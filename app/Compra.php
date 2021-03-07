<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [

        'numero', 
        'fecha_entrega', 
        'id_proveedor', 
        'id_empleado', 
        'id_almacen', 
        'monto_total',
        'observaciones', 
        'estado', 
        'eliminado'
    ];
}
