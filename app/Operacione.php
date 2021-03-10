<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacione extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'codigo', 'nombre', 'cproduccione','duracion','costoduracion','descripcion'
    ];
    public function estado(){
        return $this->belongTo(App\Estado);
    }
    public function cproduccione(){
        return $this->belongTo(App\Cproduccione);
    }

}
