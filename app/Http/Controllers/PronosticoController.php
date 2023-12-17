<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PronosticoController extends Controller
{
    public function indexPronosticoVenta (){

        return view("analisisTemporal.pronosticoVenta.index");
    }

    public function createPronosticoVenta(){
       return view("analisisTemporal.pronosticoVenta.create");
    }


}
