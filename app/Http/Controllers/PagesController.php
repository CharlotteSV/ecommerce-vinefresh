<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class PagesController extends Controller
{
    //Todas las rutas de routes\web.php

    public function encabezadosucursal(){

        return view('encabezadosucursal');
    }

    //-----------------------------------------------------------------------------
    public function encabezadoadmin($SUC_CODIGO){

        return view('encabezadoadmin');
    }
}