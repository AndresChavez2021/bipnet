<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            $TipoV = auth()->user()->tipoV;
            $TipoG = auth()->user()->tipoG;
            if ($TipoV == 1) {
                //dd('TipoV');
                return view('inicio');
                //return view('home.index');
            } else {
                if ($TipoG == 1) {  
                    return view('home.index');
                }
            }
        }
        /*if(auth()->user()){
            return view('home.index');
        }*/
        return view('inicio');
    }
}
