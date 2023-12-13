<?php

namespace App\Http\Controllers;

use App\Models\DetalleServicio;
use App\Models\Producto_Servicio;
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

                    $productos = DetalleServicio::selectRaw('id_productos, SUM(precio_venta) as total_precio_venta')
                        ->groupBy('id_productos')
                        ->orderByDesc('total_precio_venta')
                        ->limit(5)
                        ->get();
                    $points = [];
                    foreach ($productos as $producto) {
                        $points[] = [
                            'name' => $producto['id_productos'],
                            'y' => floatval($producto['total_precio_venta'])
                        ];
                    }

                    $matrizVentas = [];
                   /* foreach ($productos as $producto) {
                        $ventasPorMes = DetalleServicio::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(precio_venta) as total_ventas')
                            ->where('id_productos', $producto['id_productos'])
                            ->groupBy('year', 'month')
                            ->get();
                        $line =[];
                        foreach ($ventasPorMes as $venta) {
                            $line[] = floatval($venta['total_ventas']);
                        }
                        $matrizVentas[] = $line;
                    }*/

                    return view('home.index', ['data' => json_encode($points)]);
                    
                    //return view('home.index', ['data' => json_encode($points)], ['lines' => json_encode($matrizVentas)]);
                }
            }
        }
        /*if(auth()->user()){
            return view('home.index');
        }*/

        // Obtener la sumatoria de precios de venta por producto
        /*$sumatorias = DetalleVenta::selectRaw('id_producto, SUM(precio_venta) as total_precio_venta')
            ->groupBy('id_producto')
            ->orderByDesc('total_precio_venta')
            ->limit(5)
            ->get();
        */

        return view('inicio');
    }
}
