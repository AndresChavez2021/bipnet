<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PronosticoVenta;

class PronosticoController extends Controller
{
    public function indexPronosticoVenta (){

        $pronosticos = PronosticoVenta::all();
        $fechas = $pronosticos->pluck('fecha');
        $range = $pronosticos->map(function ($pronostico) {
            return [$pronostico->p10, $pronostico->p90];
        });
        $average = $pronosticos->map(function ($pronostico) {
            return [$pronostico->p50];
        });

        //$average = $pronosticos->pluck('p50');
      //dd($average);
      
        return view("analisisTemporal.pronosticoVenta.index", [
            'data' => [
                'range' => json_encode($range),
                'average' => json_encode($average),
            ]
        ]);
    }





    public function createPronosticoVenta(){
       return view("analisisTemporal.pronosticoVenta.create");
    }


}
