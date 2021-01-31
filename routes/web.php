<?php


Route::get('/', 'TestController@welcome');

Route::view('/about-us', 'about-us');

Route::get('test', function () {
    \Log::info('aqui podemos colocar y concatenar todos los movimientos que realiza un usuario, a las 11:30am');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

	//Sprint 1
	Route::get('/sprint1', 'HomeController@sprint1')->name('sprint1');
	//Sprint 2
	Route::get('/sprint2', 'HomeController@sprint2')->name('sprint2');
	//Nómina
	Route::get('/nomina', 'HomeController@nomina')->name('nomina');
	//Inventario
	Route::get('/inventario', 'HomeController@inventario')->name('inventario');

	//Bitácora
	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('bitacora')
		->middleware('can:logs');

	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('can:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('can:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('can:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('can:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('can:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('can:roles.destroy');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('can:roles.edit');
		
	//Users
	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('can:users.index');

	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('can:users.edit');

	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('can:users.show');

	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('can:users.destroy');

	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('can:users.edit');
	
	
	

	//Products
	Route::post('products/store', 'ProductController@store')->name('products.store')
		->middleware('can:products.create');

	Route::get('products', 'ProductController@index')->name('products.index')
		->middleware('can:products.index');

	Route::get('products/create', 'ProductController@create')->name('products.create')
		->middleware('can:products.create');

	Route::put('products/{product}', 'ProductController@update')->name('products.update')
		->middleware('can:products.edit');

	Route::get('products/{product}', 'ProductController@show')->name('products.show')
		->middleware('can:products.show');

	Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
		->middleware('can:products.destroy');

	Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
		->middleware('can:products.edit');

	//Sucursals
	Route::post('sucursals/store', 'SucursalController@store')->name('sucursals.store')
		->middleware('can:sucursals.create');

	Route::get('sprint1/sucursals', 'SucursalController@index')->name('sucursals.index')
		->middleware('can:sucursals.index');

	Route::get('sucursals/create', 'SucursalController@create')->name('sucursals.create')
		->middleware('can:sucursals.create');

	Route::put('sucursals/{sucursal}', 'SucursalController@update')->name('sucursals.update')
		->middleware('can:sucursals.edit');

	Route::get('sprint1/sucursals/{sucursal}', 'SucursalController@show')->name('sucursals.show')
		->middleware('can:sucursals.show');

	Route::delete('sucursals/{sucursal}', 'SucursalController@destroy')->name('sucursals.destroy')
		->middleware('can:sucursals.destroy');

	Route::get('sucursals/{sucursal}/edit', 'SucursalController@edit')->name('sucursals.edit')
		->middleware('can:sucursals.edit');

		
	
	//almacens
	Route::post('almacens/store', 'AlmacenController@store')->name('almacens.store')
	->middleware('can:almacens.create');

	Route::get('sprint1/almacens', 'AlmacenController@index')->name('almacens.index')
		->middleware('can:almacens.index');

	Route::get('almacens/create', 'AlmacenController@create')->name('almacens.create')
		->middleware('can:almacens.create');

	Route::put('almacens/{almacen}', 'AlmacenController@update')->name('almacens.update')
		->middleware('can:almacens.edit');

	Route::get('sprint1/almacens/{almacen}', 'AlmacenController@show')->name('almacens.show')
		->middleware('can:almacens.show');

	Route::delete('almacens/{almacen}', 'AlmacenController@destroy')->name('almacens.destroy')
		->middleware('can:almacens.destroy');

	Route::get('almacens/{almacen}/edit', 'AlmacenController@edit')->name('almacens.edit')
		->middleware('can:almacens.edit');

	
	//Departamento
	Route::post('departamentos/store', 'DepartamentoController@store')->name('departamentos.store')
		->middleware('can:departamentos.create');

	Route::get('sprint1/departamentos', 'DepartamentoController@index')->name('departamentos.index')
		->middleware('can:products.index');

	Route::get('sprint1/departamentos/create', 'DepartamentoController@create')->name('departamentos.create')
		->middleware('can:departamentos.create');

	Route::put('departamentos/{departamento}', 'DepartamentoController@update')->name('departamentos.update')
		->middleware('can:departamentos.edit');

	Route::get('sprint1/departamentos/{departamento}', 'DepartamentoController@show')->name('departamentos.show')
		->middleware('can:departamentos.show');

	Route::delete('departamentos/{departamento}', 'DepartamentoController@destroy')->name('departamentos.destroy')
		->middleware('can:departamentos.destroy');

	Route::get('departamentos/{departamento}/edit', 'DepartamentoController@edit')->name('departamentos.edit')
		->middleware('can:departamentos.edit');


    //Area
    Route::get('sprint1/area', 'AreaController@index')->name('area.index')
        ->middleware('can:area.index');

    Route::get('area/{area}', 'AreaController@show')->name('areas.show')
        ->middleware('can:materia_prima.show');

    Route::get('area/{area}/edit', 'AreaController@edit')->name('areas.edit')
        ->middleware('can:area.edit');

    Route::delete('area/{area}', 'AreaController@destroy')->name('areas.destroy')
        ->middleware('can:area.destroy');

    Route::put('area/{area}', 'AreaController@update')->name('areas.update')
        ->middleware('can:area.edit');

    Route::get('sprint1/area/create', 'AreaController@create')->name('areas.create')
        ->middleware('can:area.create');

    Route::post('area/store', 'AreaController@store')->name('areas.store')
        ->middleware('can:area.create');


});



