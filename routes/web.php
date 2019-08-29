<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Productos
Route::get('/{categoria}/{id}-{something}','Producto\ProductoController@show');
Route::resource('/','Producto\ProductoController');
// Route::get('{categoria}/{id}-{titulo}-{marca}-{modelo}','Producto\ProductoController@permalink');
// Route::get('/','Producto\ProductoController@index');
Route::get('search','Producto\ProductoController@Buscar');

//categorias
// Route::resource('categorias','Producto\CategoriaController');
Route::get('{id}-{categoria}','Producto\CategoriaController@show');


//autenticacion
Auth::routes();



// Route::get('cargar_datos','Producto\ProductoController@CargarDatos');
//Route::get('cargar_productos','Producto\ProductoController@ActualizarProductos');
// Route::get('cargar_categorias','Producto\CategoriaController@CargarCategorias');

Route::get('example','ExampleController@example');



//Route::get('/home', 'HomeController@index')->name('home');
