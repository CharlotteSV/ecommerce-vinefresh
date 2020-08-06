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

// VER PRODUCTO
Route::get('/verProducto{PRO_CODIGO}', 'ProductoController@verProducto')->name('verProducto');

// EDITAR PRODUCTO
Route::get('/editarProducto{PRO_CODIGO}', 'ProductoController@editarProducto')->name('editarProducto');

Route::put('/updateProducto{PRO_CODIGO}', 'ProductoController@updateProducto')->name('updateProducto');

// ELIMINAR PRODUCTO
Route::delete('/deleteProducto{PRO_CODIGO}', 'ProductoController@deleteProducto')->name('deleteProducto');


//------------------------------------------------CRUD PEDIDOS------------------------------------------------
// MOSTRAR PEDIDOS
Route::get('/gestionPedidos{SUC_CODIGO}', 'PedidoController@gestionPedidos')->name('gestionPedidos');

// VER PEDIDO
Route::get('/verPedido{PED_CODIGO}', 'PedidoController@verPedido')->name('verPedido');

// EDITAR PEDIDO
Route::get('/editarPedido{PED_CODIGO}', 'PedidoController@editarPedido')->name('editarPedido');

Route::put('/updatePedido{PED_CODIGO}', 'PedidoController@updatePedido')->name('updatePedido');

// ELIMINAR PEDIDO
Route::delete('/deletePedido{PED_CODIGO}', 'PedidoController@deletePedido')->name('deletePedido');


//------------------------------------------------CRUD CUENTAS------------------------------------------------
// MOSTRAR CUENTAS
Route::get('/gestionCuentas{SUC_CODIGO}', 'CuentaController@gestionCuentas')->name('gestionCuentas');