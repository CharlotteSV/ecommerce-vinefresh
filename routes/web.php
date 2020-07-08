<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Para ver la funcionalidad de la ruta es en app\Http\Controllers\PagesController

//Encabezado
Route::get('/encabezado', 'PagesController@encabezado')->name('encabezado');

//------------------------------------------------CRUD PRODUCTOS------------------------------------------------
// MOSTRAR PRODUCTOS
Route::get('/gestionProductos{SUC_CODIGO}', 'ProductoController@gestionProductos')->name('gestionProductos');

// CREAR PRODUCTO
Route::get('/formProducto{SUC_CODIGO}', 'ProductoController@formProducto')->name('formProducto');

Route::post('/gestionProductos', 'ProductoController@crearProducto')->name('crearProducto');

// EDITAR PRODUCTO
Route::get('/editarProducto{PRO_CODIGO}', 'ProductoController@editarProducto')->name('editarProducto');

Route::put('/updateProducto{PRO_CODIGO}', 'ProductoController@updateProducto')->name('updateProducto');

// ELIMINAR USUARIO
Route::delete('/deleteProducto{PRO_CODIGO}', 'ProductoController@deleteProducto')->name('deleteProducto');
