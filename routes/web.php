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
    //Sprint 4
	Route::get('/sprint4', 'HomeController@sprint4')->name('sprint4');
	//Herramientas
    Route::get('/herramientas', 'HomeController@settings')->name('settings');
    //Producción
	Route::get('/produccion', 'HomeController@produccion')->name('produccion');
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

	//Operaciones
	Route::post('operaciones/store', 'OperacioneController@store')->name('operaciones.store')
		->middleware('can:operaciones.create');

	Route::get('sprint4/operaciones', 'OperacioneController@index')->name('operaciones.index')
		->middleware('can:operaciones.index');

	Route::get('operaciones/create', 'OperacioneController@create')->name('operaciones.create')
		->middleware('can:operaciones.create');

	Route::put('operaciones/{operacione}', 'OperacioneController@update')->name('operaciones.update')
		->middleware('can:operaciones.edit');

	Route::get('sprint4/operaciones/{operacione}', 'OperacioneController@show')->name('operaciones.show')
		->middleware('can:operaciones.show');

	Route::delete('operaciones/{operacione}', 'OperacioneController@destroy')->name('operaciones.destroy')
		->middleware('can:operaciones.destroy');

	Route::get('operaciones/{operacione}/edit', 'OperacioneController@edit')->name('operaciones.edit')
		->middleware('can:operaciones.edit');

	//Cproducciones
	Route::post('cproducciones/store', 'CproduccioneController@store')->name('cproducciones.store')
		->middleware('can:cproducciones.create');

	Route::get('sprint4/cproducciones', 'CproduccioneController@index')->name('cproducciones.index')
		->middleware('can:cproducciones.index');

	Route::get('cproducciones/create', 'CproduccioneController@create')->name('cproducciones.create')
		->middleware('can:cproducciones.create');

	Route::put('cproducciones/{cproduccione}', 'CproduccioneController@update')->name('cproducciones.update')
		->middleware('can:cproducciones.edit');

	Route::get('sprint4/cproducciones/{cproduccione}', 'CproduccioneController@show')->name('cproducciones.show')
		->middleware('can:cproducciones.show');

	Route::delete('cproducciones/{cproduccione}', 'CproduccioneController@destroy')->name('cproducciones.destroy')
		->middleware('can:cproducciones.destroy');

	Route::get('cproducciones/{cproduccione}/edit', 'CproduccioneController@edit')->name('cproducciones.edit')
		->middleware('can:cproducciones.edit');

    //listamaterial
	Route::post('listamaterials/store', 'ListamaterialController@store')->name('listamaterials.store')
    ->middleware('can:listamaterials.create');

    Route::get('sprint4/listamaterials', 'ListamaterialController@index')->name('listamaterials.index')
        ->middleware('can:listamaterials.index');

    Route::get('listamaterials/create', 'ListamaterialController@create')->name('listamaterials.create')
        ->middleware('can:listamaterials.create');

    Route::put('listamaterials/{listamaterial}', 'ListamaterialController@update')->name('listamaterials.update')
        ->middleware('can:listamaterials.edit');

    Route::get('sprint4/listamaterials/{listamaterial}', 'ListamaterialController@show')->name('listamaterials.show')
        ->middleware('can:listamaterials.show');

    Route::delete('listamaterials/{listamaterial}', 'ListamaterialController@destroy')->name('listamaterials.destroy')
        ->middleware('can:listamaterials.destroy');

    Route::get('listamaterials/{listamaterial}/edit', 'ListamaterialController@edit')->name('listamaterials.edit')
        ->middleware('can:listamaterials.edit');
    
	//Departamento
	Route::post('departamentos/store', 'DepartamentoController@store')->name('departamentos.store')
		->middleware('can:departamentos.create');

	Route::get('sprint1/departamentos', 'DepartamentoController@index')->name('departamentos.index')
		->middleware('can:departamentos.index');

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
    Route::get('sprint1/area', 'AreaController@index')->name('areas.index')
        ->middleware('can:areas.index');

    Route::get('area/{area}', 'AreaController@show')->name('areas.show')
        ->middleware('can:areas.show');

    Route::get('area/{area}/edit', 'AreaController@edit')->name('areas.edit')
        ->middleware('can:areas.edit');

    Route::delete('area/{area}', 'AreaController@destroy')->name('areas.destroy')
        ->middleware('can:areas.destroy');

    Route::put('area/{area}', 'AreaController@update')->name('areas.update')
        ->middleware('can:areas.edit');

    Route::get('sprint1/area/create', 'AreaController@create')->name('areas.create')
        ->middleware('can:areas.create');

    Route::post('area/store', 'AreaController@store')->name('areas.store')
		->middleware('can:areas.create');
		
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
        ->middleware('can:cargos.show');

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
        ->middleware('can:empleados.index');

    Route::get('empleado/{empleado}', 'EmpleadoController@show')->name('empleados.show')
        ->middleware('can:empleados.show');

    Route::get('empleado/{empleado}/edit', 'EmpleadoController@edit')->name('empleados.edit')
        ->middleware('can:empleados.edit');

    Route::delete('empleado/{empleado}', 'EmpleadoController@destroy')->name('empleados.destroy')
        ->middleware('can:empleados.destroy');

    Route::put('empleado/{empleado}', 'EmpleadoController@update')->name('empleados.update')
        ->middleware('can:empleados.edit');

    Route::get('sprint1/empleado/create', 'EmpleadoController@create')->name('empleados.create')
        ->middleware('can:empleados.create');

    Route::post('empleado/store', 'EmpleadoController@store')->name('empleados.store')
		->middleware('can:empleados.create');

	//Proveedor
    Route::get('sprint2/proveedor', 'ProveedorController@index')->name('proveedores.index')
        ->middleware('can:proveedores.index');

    Route::get('proveedor/{proveedor}', 'ProveedorController@show')->name('proveedores.show')
        ->middleware('can:proveedores.show');

    Route::get('proveedor/{proveedor}/edit', 'ProveedorController@edit')->name('proveedores.edit')
        ->middleware('can:proveedores.edit');

    Route::delete('proveedor/{proveedor}/{tipo}', 'ProveedorController@destroy')->name('proveedores.destroy')
        ->middleware('can:proveedores.destroy');

    Route::put('proveedor/{proveedor}', 'ProveedorController@update')->name('proveedores.update')
        ->middleware('can:proveedores.edit');

    Route::get('sprint2/proveedor/create', 'ProveedorController@create')->name('proveedores.create')
        ->middleware('can:proveedores.create');

    Route::post('proveedor/store', 'ProveedorController@store')->name('proveedores.store')
		->middleware('can:proveedores.create');
	

		
	//Contacto
    Route::get('sprint2/contacto', 'ContactoController@index')->name('contactos.index')
        ->middleware('can:contactos.index');

    Route::get('contacto/{contacto}', 'ContactoController@show')->name('contactos.show')
        ->middleware('can:contactos.show');

    Route::get('contacto/{contacto}/edit', 'ContactoController@edit')->name('contactos.edit')
        ->middleware('can:contactos.edit');

    Route::delete('contacto/{contacto}', 'ContactoController@destroy')->name('contactos.destroy')
        ->middleware('can:contactos.destroy');

    Route::put('contacto/{contacto}', 'ContactoController@update')->name('contactos.update')
        ->middleware('can:contactos.edit');

    Route::get('sprint2/contacto/create', 'ContactoController@create')->name('contactos.create')
        ->middleware('can:contactos.create');

    Route::post('contacto/store', 'ContactoController@store')->name('contactos.store')
		->middleware('can:contactos.create');
  
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

    //Cliente
    Route::get('sprint3/cliente', 'ClienteController@index')->name('clientes.index')
        ->middleware('can:clientes.index');

    Route::get('cliente/{cliente}', 'ClienteController@show')->name('clientes.show')
        ->middleware('can:clientes.show');

    Route::get('cliente/{cliente}/edit', 'ClienteController@edit')->name('clientes.edit')
        ->middleware('can:clientes.edit');

    Route::delete('cliente/{cliente}/{tipo}', 'ClienteController@destroy')->name('clientes.destroy')
        ->middleware('can:clientes.destroy');

    Route::put('cliente/{cliente}', 'ClienteController@update')->name('clientes.update')
        ->middleware('can:clientes.edit');

    Route::get('sprint3/cliente/create', 'ClienteController@create')->name('clientes.create')
        ->middleware('can:clientes.create');

    Route::post('cliente/store', 'ClienteController@store')->name('clientes.store')
        ->middleware('can:clientes.create');
        
    //Pedido
    Route::get('sprint3/pedido', 'PedidoController@index')->name('pedidos.index')
        ->middleware('can:pedidos.index');

    Route::get('pedido/{pedido}', 'PedidoController@show')->name('pedidos.show')
        ->middleware('can:pedidos.show');

    Route::get('pedido/{pedido}/edit', 'PedidoController@edit')->name('pedidos.edit')
        ->middleware('can:pedidos.edit');

    Route::delete('pedido/{pedido}/{tipo}', 'PedidoController@destroy')->name('pedidos.destroy')
        ->middleware('can:pedidos.destroy');

    Route::put('pedido/{pedido}', 'PedidoController@update')->name('pedidos.update')
        ->middleware('can:pedidos.edit');

    Route::get('sprint3/pedido/create', 'PedidoController@create')->name('pedidos.create')
        ->middleware('can:pedidos.create');

    Route::post('pedido/store', 'PedidoController@store')->name('pedidos.store')
		->middleware('can:pedidos.create');

    //Venta
    Route::get('sprint3/venta', 'VentaController@index')->name('ventas.index')
        ->middleware('can:ventas.index');

    Route::get('venta/{venta}', 'VentaController@show')->name('ventas.show')
        ->middleware('can:ventas.show');

    Route::get('venta/{venta}/edit', 'VentaController@edit')->name('ventas.edit')
        ->middleware('can:ventas.edit');

    Route::delete('venta/{venta}/{tipo}', 'VentaController@destroy')->name('ventas.destroy')
        ->middleware('can:ventas.destroy');

    Route::put('venta/{venta}', 'VentaController@update')->name('ventas.update')
        ->middleware('can:ventas.edit');

    Route::get('sprint3/venta/create', 'VentaController@create')->name('ventas.create')
        ->middleware('can:ventas.create');

    Route::post('venta/store', 'VentaController@store')->name('ventas.store')
        ->middleware('can:ventas.create');
        
    //Compra
    Route::get('sprint3/compra', 'CompraController@index')->name('compras.index')
        ->middleware('can:compras.index');

    Route::get('compra/{compra}', 'CompraController@show')->name('compras.show')
        ->middleware('can:compras.show');

    Route::get('compra/{compra}/edit', 'CompraController@edit')->name('compras.edit')
        ->middleware('can:compras.edit');

    Route::delete('compra/{compra}/{tipo}', 'CompraController@destroy')->name('compras.destroy')
        ->middleware('can:compras.destroy');

    Route::put('compra/{compra}', 'CompraController@update')->name('compras.update')
        ->middleware('can:compras.edit');

    Route::get('sprint3/compra/create', 'CompraController@create')->name('compras.create')
        ->middleware('can:compras.create');

    Route::post('compra/store', 'CompraController@store')->name('compras.store')
        ->middleware('can:compras.create');
        
    //Salida
    Route::get('sprint3/salida', 'SalidaController@index')->name('salidas.index')
        ->middleware('can:salidas.index');
    //Ingreso
    Route::get('sprint3/ingreso', 'IngresoController@index')->name('ingresos.index')
    ->middleware('can:ingresos.index');

    //Ruta
    Route::get('sprint4/ruta', 'RutaController@index')->name('rutas.index')
        ->middleware('can:rutas.index');

    Route::get('ruta/{ruta}', 'RutaController@show')->name('rutas.show')
        ->middleware('can:rutas.show');

    Route::get('ruta/{ruta}/edit', 'RutaController@edit')->name('rutas.edit')
        ->middleware('can:rutas.edit');

    Route::delete('ruta/{ruta}/{tipo}', 'RutaController@destroy')->name('rutas.destroy')
        ->middleware('can:rutas.destroy');

    Route::put('ruta/{ruta}', 'RutaController@update')->name('rutas.update')
        ->middleware('can:rutas.edit');

    Route::get('sprint4/ruta/create', 'RutaController@create')->name('rutas.create')
        ->middleware('can:rutas.create');

    Route::post('ruta/store', 'RutaController@store')->name('rutas.store')
        ->middleware('can:rutas.create');

    //Exportar datos
    Route::get('ingresos-lista-pdf', 'IngresoController@exportPDF')->name('ingresos.pdf')
        ->middleware('can:ingresos.pdf');
});




