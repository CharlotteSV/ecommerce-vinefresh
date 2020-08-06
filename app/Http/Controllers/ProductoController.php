<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Http\Controllers\Redirect;
use App;
use GuzzleHttp\Psr7\Request as Psr7Request;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class ProductoController extends Controller
{
    //
    public function gestionProductos($SUC_CODIGO, Request $request){

        // Obtener datos de la BD
        /*
        $productos = App\Producto::all();
        return view('catalogo', compact('productos'));
        
        $semestre = Semestre::find('ID del semestre');
        $nombre_seccion = $semestre->seccion->nombreseccion;
        */
        $buscar = $request->get('buscarpor');
        $tipo = $request->get('tipo');
        $sucursal = App\Sucursal::where('SUC_CODIGO', $SUC_CODIGO)->get();
        $productos = App\Producto::where('SUC_CODIGO', $SUC_CODIGO)->buscarpor($tipo, $buscar)->orderBy('PRO_NOMBRE', 'ASC')->paginate(10);
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
            'descripcion' => 'required',
            'formatomedida' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ]);

        // Crear Producto
        $newProducto = new App\Producto;
        $newProducto->SUC_CODIGO = $request->sucursal;
        $newProducto->PRO_NOMBRE = $request->nombre;
        $newProducto->PRO_DESCRIPCION = $request->descripcion;
        $newProducto->FOR_CODIGO = $request->formatomedida;
        $newProducto->PRO_PRECIO = $request->precio;
        $newProducto->PRO_STOCK = $request->stock;

        $newProducto->save();
        return back()->with('mensaje', 'Producto Agregado');
    }

    //-----------------------------------------------------------------------------
    public function verProducto($PRO_CODIGO){

        $verProducto = App\Producto::findOrFail($PRO_CODIGO);
        // Obtener datos de la BD de Formato Medida
        $formatomedida = App\FormatoMedida::findOrFail($verProducto->FOR_CODIGO);
        //$SUC_CODIGO = $productoUpdate->SUC_CODIGO;
        // Obtener dato del PRODUCTO seleccionado y modificar
        return view('verProducto', compact('formatomedida'), /*compact('SUC_CODIGO'), */compact('verProducto'));
    }

    //-----------------------------------------------------------------------------
    public function editarProducto($PRO_CODIGO){

        // Obtener datos de la BD de Formato Medida
        $formatomedida = App\FormatoMedida::all();
        $productoUpdate = App\Producto::findOrFail($PRO_CODIGO);
        //dd($productoUpdate);
        //$SUC_CODIGO = $productoUpdate->SUC_CODIGO;
        // Obtener dato del PRODUCTO seleccionado y modificar
        return view('editarProducto', compact('formatomedida'), /*compact('SUC_CODIGO'), */compact('productoUpdate'));
    }

    //-----------------------------------------------------------------------------
    public function updateProducto(Request $request, $PRO_CODIGO){

        $request->validate([
            'sucursal' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'formatomedida' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ]);
        
        $productoUpdate = App\Producto::findOrFail($PRO_CODIGO);
        $productoUpdate->SUC_CODIGO = $request->sucursal;
        $productoUpdate->PRO_NOMBRE = $request->nombre;
        $productoUpdate->PRO_DESCRIPCION = $request->descripcion;
        $productoUpdate->FOR_CODIGO = $request->formatomedida;
        $productoUpdate->PRO_PRECIO = $request->precio;
        $productoUpdate->PRO_STOCK = $request->stock;

        $productoUpdate->save();
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
