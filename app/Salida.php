<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $fillable = [

        'numero', 
        'estado', 
        'eliminado'
    ];
}
