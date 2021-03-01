<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [

        'codigo', 
        'identificacion', 
        'nombre', 
        'imagen', 
        'telefono',
        'celular', 
        'correo',
        'direccion',  
        'id_municipio',
        'estado', 
        'eliminado'
        ];
}
