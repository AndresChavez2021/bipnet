<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PronosticoProducto;
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

            $fecha = $pronosticos->map(function ($pronostico) {
                // return strtotime($pronostico->fecha. '-01');
                return date('d M Y', strtotime($pronostico->fecha. '-01'));
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
                'fecha'=>$request->mes,
                'fechaGrafico'=>$fecha // fecha para mostrar en el gráfico
            ]);
        } else {
            $pronosticos = PronosticoVenta::all();
            $range = $pronosticos->map(function ($pronostico) {
                return [floatval($pronostico->p10), floatval($pronostico->p90)];
            });

            $fecha = $pronosticos->map(function ($pronostico) {
                // return strtotime($pronostico->fecha. '-01');
                return date('d M Y', strtotime($pronostico->fecha. '-01'));
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
                'fecha'=>'null',
                'fechaGrafico'=>$fecha,// si no filtra , trae por defecto todo

            ]);
        }



    }

    public function createPronosticoVenta()
    {
        return view("analisisTemporal.pronosticoVenta.create");
    }

    public function indexPronosticoProducto(Request $request)
    {
        if (isset($request->mes)) {
            $pronosticos = PronosticoProducto::whereMonth('fecha', $request->mes)->get();
            // Obtener fechas, ranges y averages de los pronósticos

            $range = $pronosticos->map(function ($pronostico) {
                return [floatval($pronostico->p10), floatval($pronostico->p90)];
            });
            $fecha = $pronosticos->map(function ($pronostico) {
                // return strtotime($pronostico->fecha. '-01');
                return date('d M Y', strtotime($pronostico->fecha. '-01'));
            });


            //dd($fecha);
            $average2 = $pronosticos->map(function ($pronostico) {
                return [floatval($pronostico->p50)];
            });


            //  var_dump($request->all());
            return view("analisisTemporal.pronosticoProducto.index", [
                'data' => [
                    'range' => json_encode($range),
                    'average' => json_encode($average2),


                ],
                'fecha'=>$request->mes,/// para el filtrado de datos
                'fechaGrafico'=>$fecha // fecha para mostrar en el gráfico
            ]);
        } else {
            $pronosticos = PronosticoVenta::all();
            $range = $pronosticos->map(function ($pronostico) {
                return [floatval($pronostico->p10), floatval($pronostico->p90)];
            });


            $average2 = $pronosticos->map(function ($pronostico) {
                return [floatval($pronostico->p50)];
            });
            $fecha = $pronosticos->map(function ($pronostico) {
                // return strtotime($pronostico->fecha. '-01');
                return date('d M Y', strtotime($pronostico->fecha. '-01'));
            });

            // dd($average2);
            //  var_dump($request->all());
            return view("analisisTemporal.pronosticoProducto.index", [
                'data' => [
                    'range' => json_encode($range),
                    'average' => json_encode($average2),

                ],
                'fecha'=>'null',
                'fechaGrafico'=>$fecha,


            ]);
        }



    }
}
