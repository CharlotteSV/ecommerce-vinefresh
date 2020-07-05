<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ProductoController extends Controller
{
    //
    public function gestionProductos(){

        // Obtener datos de la BD
        /*
        $productos = App\Producto::all();
        return view('catalogo', compact('productos'));
        
        $semestre = Semestre::find('ID del semestre');
        $nombre_seccion = $semestre->seccion->nombreseccion;
        */
        
        $productos = App\Producto::where('SUC_CODIGO', 2)->get();
        return view('gestionProductos', compact('productos'));
        
        
    }
}
