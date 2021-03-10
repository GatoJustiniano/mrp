<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listamaterial extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'componente', 'cantidad', 'unidadmedida', 'costounitario','subtotal'
    ];
    public function estado(){
        return $this->belongTo(App\Estado);
    }
    public function articulo(){
        return $this->belongTo(App\Articulo);
    }

}
