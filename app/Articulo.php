<?php

namespace App;


use Illuminate\Database\Eloquent\Model;



class Articulo extends Model
{
    protected $fillable = [
        'nombre', 'cantidad_minima', 'codigo', 'imagen', 'precio_compra', 'precio_venta', 'tipo', 'estado', 'sub_categoria_id', 'unidad_medida_id', 'proveedor_id'
    ];

    public function sub_categoria(){
        return $this->belongsTo('App\SubCategoria');
    }
    public function unidad_medida(){
        return $this->belongsTo('App\UnidadMedida');
    }
    public function proveedor(){
        return $this->belongsTo('App\Proveedor');
    }
    public function estado(){
        return $this->belongsTo('App\Estado');
    }

}
