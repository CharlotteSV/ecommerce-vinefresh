<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class CuentaController extends Controller
{
    //
    public function gestionCuentas($SUC_CODIGO, Request $request){

 
        return view('gestionCuentas', compact('SUC_CODIGO'));

    }
}
