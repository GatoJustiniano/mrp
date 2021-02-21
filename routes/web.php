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
	//Herramientas
	Route::get('/herramientas', 'HomeController@settings')->name('settings');
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
		
	//Estado
	Route::resource('sprint1/estado','EstadoController')->name('estado','estado.index');

	//Provincia
	Route::resource('sprint1/provincia','ProvinciaController')->name('provincia','provincia.index');

	//Municipio
	Route::resource('sprint1/municipio','MunicipioController')->name('municipio','municipio.index');

	//Cargo
    Route::get('sprint1/cargos', 'CargoController@index')->name('cargos.index')
        ->middleware('can:cargos.index');

    Route::get('cargos/{cargos}', 'CargoController@show')->name('cargos.show')
        ->middleware('can:materia_prima.show');

    Route::get('cargos/{cargos}/edit', 'CargoController@edit')->name('cargos.edit')
        ->middleware('can:cargos.edit');

    Route::delete('cargos/{cargos}', 'CargoController@destroy')->name('cargos.destroy')
        ->middleware('can:cargos.destroy');

    Route::put('cargos/{cargos}', 'CargoController@update')->name('cargos.update')
        ->middleware('can:cargos.edit');

    Route::get('sprint1/cargos/create', 'CargoController@create')->name('cargos.create')
        ->middleware('can:cargos.create');

    Route::post('cargos/store', 'CargoController@store')->name('cargos.store')
		->middleware('can:cargos.create');

	//Empleado
    Route::get('sprint1/empleado', 'EmpleadoController@index')->name('empleados.index')
        ->middleware('can:empleado.index');

    Route::get('empleado/{empleado}', 'EmpleadoController@show')->name('empleados.show')
        ->middleware('can:materia_prima.show');

    Route::get('empleado/{empleado}/edit', 'EmpleadoController@edit')->name('empleados.edit')
        ->middleware('can:empleado.edit');

    Route::delete('empleado/{empleado}', 'EmpleadoController@destroy')->name('empleados.destroy')
        ->middleware('can:empleado.destroy');

    Route::put('empleado/{empleado}', 'EmpleadoController@update')->name('empleados.update')
        ->middleware('can:empleado.edit');

    Route::get('sprint1/empleado/create', 'EmpleadoController@create')->name('empleados.create')
        ->middleware('can:empleado.create');

    Route::post('empleado/store', 'EmpleadoController@store')->name('empleados.store')
		->middleware('can:empleado.create');

	//Proveedor
    Route::get('sprint2/proveedor', 'ProveedorController@index')->name('proveedores.index')
        ->middleware('can:proveedor.index');

    Route::get('proveedor/{proveedor}', 'ProveedorController@show')->name('proveedores.show')
        ->middleware('can:proveedor.show');

    Route::get('proveedor/{proveedor}/edit', 'ProveedorController@edit')->name('proveedores.edit')
        ->middleware('can:proveedor.edit');

    Route::delete('proveedor/{proveedor}/{tipo}', 'ProveedorController@destroy')->name('proveedores.destroy')
        ->middleware('can:proveedor.destroy');

    Route::put('proveedor/{proveedor}', 'ProveedorController@update')->name('proveedores.update')
        ->middleware('can:proveedor.edit');

    Route::get('sprint2/proveedor/create', 'ProveedorController@create')->name('proveedores.create')
        ->middleware('can:proveedor.create');

    Route::post('proveedor/store', 'ProveedorController@store')->name('proveedores.store')
		->middleware('can:proveedor.create');
	

		
	//Contacto
    Route::get('sprint2/contacto', 'ContactoController@index')->name('contactos.index')
        ->middleware('can:contacto.index');

    Route::get('contacto/{contacto}', 'ContactoController@show')->name('contactos.show')
        ->middleware('can:contacto.show');

    Route::get('contacto/{contacto}/edit', 'ContactoController@edit')->name('contactos.edit')
        ->middleware('can:contacto.edit');

    Route::delete('contacto/{contacto}', 'ContactoController@destroy')->name('contactos.destroy')
        ->middleware('can:contacto.destroy');

    Route::put('contacto/{contacto}', 'ContactoController@update')->name('contactos.update')
        ->middleware('can:contacto.edit');

    Route::get('sprint2/contacto/create', 'ContactoController@create')->name('contactos.create')
        ->middleware('can:contacto.create');

    Route::post('contacto/store', 'ContactoController@store')->name('contactos.store')
		->middleware('can:contacto.create');
  
    //categorias
    Route::post('categorias/store', 'CategoriaController@store')->name('categorias.store')
        ->middleware('can:categorias.create');

    Route::get('inventario/categorias', 'CategoriaController@index')->name('categorias.index')
        ->middleware('can:categorias.index');

    Route::get('inventario/categorias/create', 'CategoriaController@create')->name('categorias.create')
        ->middleware('can:categorias.create');

    Route::put('categorias/{categoria}', 'CategoriaController@update')->name('categorias.update')
        ->middleware('can:categorias.edit');

    Route::get('inventario/categorias/{categoria}', 'CategoriaController@show')->name('categorias.show')
        ->middleware('can:categorias.show');

    Route::delete('categorias/{categoria}', 'CategoriaController@destroy')->name('categorias.destroy')
        ->middleware('can:categorias.destroy');

    Route::get('categorias/{categoria}/edit', 'CategoriaController@edit')->name('categorias.edit')
        ->middleware('can:categorias.edit');

    //sub_categorias
    Route::post('sub_categorias/store', 'SubCategoriaController@store')->name('sub_categorias.store')
        ->middleware('can:sub_categorias.create');

    Route::get('inventario/sub_categorias', 'SubCategoriaController@index')->name('sub_categorias.index')
        ->middleware('can:sub_categorias.index');

    Route::get('inventario/sub_categorias/create', 'SubCategoriaController@create')->name('sub_categorias.create')
        ->middleware('can:sub_categorias.create');

    Route::put('sub_categorias/{sub_categoria}', 'SubCategoriaController@update')->name('sub_categorias.update')
        ->middleware('can:sub_categorias.edit');

    Route::get('inventario/sub_categorias/{sub_categoria}', 'SubCategoriaController@show')->name('sub_categorias.show')
        ->middleware('can:sub_categorias.show');

    Route::delete('sub_categorias/{sub_categoria}', 'SubCategoriaController@destroy')->name('sub_categorias.destroy')
        ->middleware('can:sub_categorias.destroy');

    Route::get('sub_categorias/{sub_categoria}/edit', 'SubCategoriaController@edit')->name('sub_categorias.edit')
        ->middleware('can:sub_categorias.edit');


    //unidad medidas
    Route::post('unidad_medidas/store', 'UnidadMedidaController@store')->name('unidad_medidas.store')
        ->middleware('can:unidad_medidas.create');

    Route::get('inventario/unidad_medidas', 'UnidadMedidaController@index')->name('unidad_medidas.index')
        ->middleware('can:unidad_medidas.index');

    Route::get('inventario/unidad_medidas/create', 'UnidadMedidaController@create')->name('unidad_medidas.create')
        ->middleware('can:unidad_medidas.create');

    Route::put('unidad_medidas/{unidad_medida}', 'UnidadMedidaController@update')->name('unidad_medidas.update')
        ->middleware('can:categorias.edit');

    Route::get('inventario/unidad_medidas/{unidad_medida}', 'UnidadMedidaController@show')->name('unidad_medidas.show')
        ->middleware('can:unidad_medidas.show');

    Route::delete('unidad_medidas/{unidad_medida}', 'UnidadMedidaController@destroy')->name('unidad_medidas.destroy')
        ->middleware('can:unidad_medidas.destroy');

    Route::get('unidad_medidas/{unidad_medida}/edit', 'UnidadMedidaController@edit')->name('unidad_medidas.edit')
        ->middleware('can:unidad_medidas.edit');

    //articulos
    Route::post('articulos/store', 'ArticuloController@store')->name('articulos.store')
        ->middleware('can:articulos.create');

    Route::get('inventario/articulos', 'ArticuloController@index')->name('articulos.index')
        ->middleware('can:articulos.index');

    Route::get('inventario/articulos/create', 'ArticuloController@create')->name('articulos.create')
        ->middleware('can:articulos.create');

    Route::put('articulos/{articulo}', 'ArticuloController@update')->name('articulos.update')
        ->middleware('can:articulos.edit');

    Route::get('inventario/articulos/{articulo}', 'ArticuloController@show')->name('articulos.show')
        ->middleware('can:articulos.show');

    Route::delete('articulos/{articulo}', 'ArticuloController@destroy')->name('articulos.destroy')
        ->middleware('can:articulos.destroy');

    Route::get('articulos/{articulo}/edit', 'ArticuloController@edit')->name('articulos.edit')
        ->middleware('can:articulos.edit');

});




