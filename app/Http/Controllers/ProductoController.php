<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class ProductoController extends Controller
{
    //
    public function gestionProductos($SUC_CODIGO){

        // Obtener datos de la BD
        /*
        $productos = App\Producto::all();
        return view('catalogo', compact('productos'));
        
        $semestre = Semestre::find('ID del semestre');
        $nombre_seccion = $semestre->seccion->nombreseccion;
        */
        
        $productos = App\Producto::where('SUC_CODIGO', $SUC_CODIGO)->get();
        return view('gestionProductos', compact('productos'), ['SUC_CODIGO' => $SUC_CODIGO]);        
    }

    //-----------------------------------------------------------------------------
    public function formProducto(){

        // Mostrar formulario para crear usuario
        return view('formProducto');
    }

    //-----------------------------------------------------------------------------
    public function crearProducto(Request $request){
        // return $request->all();

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required'
        ]);

        // Crear Producto
        $newUser = new App\Usuario;
        $newUser->nombre = $request->nombre;
        $newUser->apellido = $request->apellido;

        $newUser->save();
        return back()->with('mensaje', 'Usuario Agregado');
    }

    //-----------------------------------------------------------------------------
    public function editarProducto($PRO_CODIGO){

        $producto = App\Producto::findOrFail($PRO_CODIGO);
        // Obtener dato del PRODUCTO seleccionado y modificar
        return view('editarProducto', compact('producto'));
    }

    //-----------------------------------------------------------------------------
    public function updateProducto(Request $request, $PRO_CODIGO){

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required'
        ]);
        
        $userUpdate = App\Usuario::findOrFail($PRO_CODIGO);
        $userUpdate->nombre = $request->nombre;
        $userUpdate->apellido = $request->apellido;

        $userUpdate->save();
        return back()->with('mensaje', 'Usuario Editado');
    }

    //-----------------------------------------------------------------------------
    public function deleteProducto($PRO_CODIGO){
        
        $productoDelete = App\Producto::findOrFail($PRO_CODIGO);
        // Eliminar usuario seleccionado
        $productoDelete->delete();
        return back()->with('mensaje', 'Producto Eliminado');
    }
}
