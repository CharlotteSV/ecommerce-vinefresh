<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use PhpParser\Node\Stmt\Foreach_;

class PedidoController extends Controller
{
    //
    public function gestionPedidos($SUC_CODIGO, Request $request){

        $buscar = $request->get('buscarpor');
        $tipo = $request->get('tipo');
        $sucursal = App\Sucursal::where('SUC_CODIGO', $SUC_CODIGO)->get();
        $pedidos = App\Pedido::where('SUC_CODIGO', $SUC_CODIGO)->buscarpor($tipo, $buscar)->orderBy('PED_CODIGO', 'DESC')->paginate(10);
        return view('gestionPedidos', compact('pedidos'), compact('SUC_CODIGO'));

    }

    //-----------------------------------------------------------------------------
    public function verPedido($PED_CODIGO){

        //Obtener el pedido elegido
        $verPedido = App\Pedido::findOrFail($PED_CODIGO);

        // Obtener datos de la BD de Contenido Pedido
        $contenidopedido = App\ContenidoPedido::where('PED_CODIGO', $verPedido->PED_CODIGO)->get();

        // Obtener dato del PEDIDO seleccionado y modificar
        return view('verPedido', compact('contenidopedido'), compact('verPedido'));
    }

    //-----------------------------------------------------------------------------
    public function editarPedido($PED_CODIGO){

    }

    //-----------------------------------------------------------------------------
    public function updatePedido(Request $request, $PED_CODIGO){

    }

    //-----------------------------------------------------------------------------
    public function deletePedido($PED_CODIGO){
        
        $pedidoDelete = App\Pedido::findOrFail($PED_CODIGO);
        $contenidopedidoDelete = App\ContenidoPedido::where('PED_CODIGO', $pedidoDelete->PED_CODIGO);

        //Sumar la cantidad de los productos del contenido del pedido al stock del producto en sucursal
        foreach($contenidopedidoDelete as $contenido){
            $producto = App\Producto::findOrFail('PRO_CODIGO', $contenido->PRO_CODIGO);
            $cantidad = $contenido->CON_CANTIDAD;
            $producto->PRO_STOCK += $cantidad;
            $producto->save();
        }
        
        // Eliminar pedido seleccionado
        $contenidopedidoDelete->delete();
        $pedidoDelete->delete();
        return back()->with('mensaje', 'Pedido Eliminado');
    }
}