<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class SucursalController extends Controller
{
    //
    public function seleccionarsucursal(){

        $sucursales = App\Sucursal::all();
        return view('seleccionarsucursal', compact('sucursales'));
    }

    //-----------------------------------------------------------------------------
    public function verSucursal($SUC_CODIGO){

        $verSucursal = App\Sucursal::findOrFail($SUC_CODIGO);
        return view('verSucursal', compact('SUC_CODIGO'), compact('verSucursal'));
    }
}
