<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [

    'codigo', 'nombre', 
    'direccion', 'correo',
    'telefono',
    'imagen', 'id_municipio',
    'estado', 'eliminado'
    ];
}
