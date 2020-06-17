<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Todas las rutas de routes\web.php

    public function encabezado(){
        return view('encabezado');
    }
}