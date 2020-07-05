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
    public function updateProducto(Request $request, $id){

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required'
        ]);
        
        $userUpdate = App\Usuario::findOrFail($id);
        $userUpdate->nombre = $request->nombre;
        $userUpdate->apellido = $request->apellido;

        $userUpdate->save();
        return back()->with('mensaje', 'Usuario Editado');
    }

    //-----------------------------------------------------------------------------
    public function deleteProducto($id){
        
        $userDelete = App\Usuario::findOrFail($id);
        // Eliminar usuario seleccionado
        $userDelete->delete();
        return back()->with('mensaje', 'Usuario Eliminado');
    }
}
