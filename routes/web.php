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

// MOSTRAR CATALOGO
Route::get('/gestionProductos', 'ProductoController@gestionProductos')->name('gestionProductos');