<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable = [

    'nombre', 
    'cargo',  
    'telefono', 
    'celular',
    'correo', 
    'nota',
    'id_proveedor',
    'estado', 
    'eliminado'
    ];
}
