<?php

use Illuminate\Http\Request;

Route::get( '/estado/{id}/provincias' , 'ProveedorController@byEstado');
Route::get( '/provincia/{id}/municipios' , 'ProveedorController@byProvincia');

Route::get( '/pedido/{id}/cliente' , 'PedidoController@byCliente');
Route::get( '/pedido/{id}/empleado' , 'PedidoController@byEmpleado');
