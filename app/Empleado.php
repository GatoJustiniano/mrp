<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'codigo', 'cedula', 'nombre', 
        'direccion', 'email',
        'fecha_nac', 'telefono',
        'foto', 'id_departamento',
        'id_sucursal', 'id_cargo',
        'estado'
    ];
}
