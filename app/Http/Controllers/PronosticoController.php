<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PronosticoVenta;

class PronosticoController extends Controller
{
    public function indexPronosticoVenta(Request $request)
    {
        if (isset($request->mes)) {
            $pronosticos = PronosticoVenta::whereMonth('fecha', $request->mes)->get();
            // Obtener fechas, ranges y averages de los pronósticos

            $range = $pronosticos->map(function ($pronostico) {
                return [floatval($pronostico->p10), floatval($pronostico->p90)];
            });


            $average2 = $pronosticos->map(function ($pronostico) {
                return [floatval($pronostico->p50)];
            });
            // dd($average2);
            //  var_dump($request->all());
            return view("analisisTemporal.pronosticoVenta.index", [
                'data' => [
                    'range' => json_encode($range),
                    'average' => json_encode($average2),

                ],
                'fecha'=>$request->mes
            ]);
        } else {
            $pronosticos = PronosticoVenta::all();
            $range = $pronosticos->map(function ($pronostico) {
                return [floatval($pronostico->p10), floatval($pronostico->p90)];
            });


            $average2 = $pronosticos->map(function ($pronostico) {
                return [floatval($pronostico->p50)];
            });
            // dd($average2);
            //  var_dump($request->all());
            return view("analisisTemporal.pronosticoVenta.index", [
                'data' => [
                    'range' => json_encode($range),
                    'average' => json_encode($average2),
                ]
            ]);
        }

        // Obtener fechas, ranges y averages de los pronósticos


    }

    public function createPronosticoVenta()
    {
        return view("analisisTemporal.pronosticoVenta.create");
    }
}
