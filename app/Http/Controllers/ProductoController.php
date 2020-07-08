<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Http\Controllers\Redirect;
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
        $sucursal = App\Sucursal::where('SUC_CODIGO', $SUC_CODIGO)->get();
        $productos = App\Producto::where('SUC_CODIGO', $SUC_CODIGO)->get();
        return view('gestionProductos', compact('productos'), compact('SUC_CODIGO'));        
    }

    //-----------------------------------------------------------------------------
    public function formProducto($SUC_CODIGO){

        // Obtener datos de la BD de Formato Medida
        $formatomedida = App\FormatoMedida::all();
        // Mostrar formulario para crear producto
        return view('formProducto', compact('formatomedida'), compact('SUC_CODIGO'));
    }

    //-----------------------------------------------------------------------------
    public function crearProducto(Request $request){
        // return $request->all();

        $request->validate([
            'sucursal' => 'required',
            'nombre' => 'required',
            'formatomedida' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ]);

        // Crear Producto
        $newProducto = new App\Producto;
        $newProducto->SUC_CODIGO = $request->sucursal;
        $newProducto->PRO_NOMBRE = $request->nombre;
        $newProducto->FOR_CODIGO = $request->formatomedida;
        $newProducto->PRO_DESCRIPCION = $request->descripcion;
        $newProducto->PRO_PRECIO = $request->precio;
        $newProducto->PRO_STOCK = $request->stock;

        $newProducto->save();
        return back()->with('mensaje', 'Producto Agregado');
    }

    //-----------------------------------------------------------------------------
    public function editarProducto($PRO_CODIGO){

        // Obtener datos de la BD de Formato Medida
        $formatomedida = App\FormatoMedida::all();
        $productoUpdate = App\Producto::findOrFail($PRO_CODIGO);
        $SUC_CODIGO = $productoUpdate->SUC_CODIGO;
        // Obtener dato del PRODUCTO seleccionado y modificar
        return view('editarProducto', compact('formatomedida'), compact('SUC_CODIGO'), compact('productoUpdate'));
    }

    //-----------------------------------------------------------------------------
    public function updateProducto(Request $request, $PRO_CODIGO){

        $request->validate([
            'sucursal' => 'required',
            'nombre' => 'required',
            'formatomedida' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ]);
        
        $updateProducto = App\Producto::findOrFail($PRO_CODIGO);
        $updateProducto->SUC_CODIGO = $request->sucursal;
        $updateProducto->PRO_NOMBRE = $request->nombre;
        $updateProducto->FOR_CODIGO = $request->formatomedida;
        $updateProducto->PRO_DESCRIPCION = $request->descripcion;
        $updateProducto->PRO_PRECIO = $request->precio;
        $updateProducto->PRO_STOCK = $request->stock;

        $updateProducto->save();
        return back()->with('mensaje', 'Producto Editado');
    }

    //-----------------------------------------------------------------------------
    public function deleteProducto($PRO_CODIGO){
        
        $productoDelete = App\Producto::findOrFail($PRO_CODIGO);
        // Eliminar usuario seleccionado
        $productoDelete->delete();
        return back()->with('mensaje', 'Producto Eliminado');
    }
}
