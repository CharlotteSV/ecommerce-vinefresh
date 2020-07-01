<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function mostrarProductos(){

        // Obtener datos de la BD
        $usuarios = App\Usuario::all();
        return view('read', compact('usuarios'));
    }
}
