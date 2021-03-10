<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cproduccione extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'capacidad', 'codigo', 'costoadicional', 'costohora', 'descripcion','estado','nombre'
    ];
    public function estado(){
        return $this->belongTo(App\Estado);
    }

}
