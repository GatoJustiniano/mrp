<?php

use Illuminate\Http\Request;

Route::get( '/estado/{id}/provincias' , 'ProveedorController@byEstado');
Route::get( '/provincia/{id}/municipios' , 'ProveedorController@byProvincia');
