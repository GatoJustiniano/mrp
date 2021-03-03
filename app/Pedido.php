<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [

        'numero', 
        'fecha_entrega', 
        'id_cliente', 
        'id_empleado', 
        'monto_total',
        'observaciones', 
        'estado', 
        'eliminado'
    ];
}
