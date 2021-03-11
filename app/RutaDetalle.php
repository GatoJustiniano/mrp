<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RutaDetalle extends Model
{
    protected $fillable = [

        'id_ruta',
        'id_operacion'

    ];
}
