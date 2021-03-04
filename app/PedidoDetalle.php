<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    protected $fillable = [

        'id_pedido', 
        'id_articulo', 
        'cantidad', 
        'descuento'
    ];
}
