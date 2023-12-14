<?php

namespace App\Http\Controllers;

use App\Models\DetalleServicio;
use App\Models\Estado;
use App\Models\OportunidadDeVenta;
use App\Models\Producto_Servicio;
use App\Models\Venta;
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

                    //VENTA DE TODOS LOS PRODUCTOS
                    $productosTodosJs = [];
                    $oportunidadesValidadas = OportunidadDeVenta::where('id_estado', 7)->get();
                    //$productosVendidos = $oportunidadesValidadas->detalles;
                    $productosTodos = DetalleServicio::selectRaw('id_productos, SUM(cantidad*precio_venta) as total_precio_venta')
                        ->groupBy('id_productos')
                        ->orderByDesc('total_precio_venta')
                        ->get();
                    foreach ($productosTodos as $producto) {
                        $nombre = Producto_Servicio::find($producto['id_productos'])->nombre;
                        $productosTodosJs[] = [
                            'x' => $nombre,
                            'value' => floatval($producto['total_precio_venta'])
                        ];
                    }

                    //NOMBRE DE TODOS LOS PRODUCTOS EN ORDEN DE MAYOR VENTAS A MENOR EN BS.
                    $nombreProductosTodos = [];
                    foreach ($productosTodos as $producto) {
                        $nombre = Producto_Servicio::find($producto['id_productos'])->nombre;
                        $nombreProductosTodos[] = [
                            'nombre' => $nombre
                        ];
                    }

                    //LOS 5 PRODUCTOS MAS VENDIDOS
                    $productos = DetalleServicio::selectRaw('id_productos, SUM(cantidad*precio_venta) as total_precio_venta')
                        ->groupBy('id_productos')
                        ->orderByDesc('total_precio_venta')
                        ->limit(5)
                        ->get();
                    $points = [];
                    foreach ($productos as $producto) {
                        $nombre = Producto_Servicio::find($producto['id_productos'])->nombre;
                        $points[] = [
                            'name' => $nombre,
                            'y' => floatval($producto['total_precio_venta'])
                        ];
                    }

                    //VENTAS POR MES DE LOS 5 ANTERIORES PRODUCTOS
                    $matrizVentas = [];
                    $dataVentasMes = [];
                    foreach ($productos as $producto) {
                        $ventasPorMes = DetalleServicio::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(cantidad*precio_venta) as total_ventas')
                            ->where('id_productos', $producto['id_productos'])
                            ->groupBy('year', 'month')
                            ->get();
                        $line =[];
                        foreach ($ventasPorMes as $venta) {
                            $line[] = floatval($venta['total_ventas']);
                        }
                        //$matrizVentas[] = $line;
                        $nombre = Producto_Servicio::find($producto['id_productos'])->nombre;
                        $dataVentasMes[] = [
                            'name' => $nombre,
                            'data' => $line
                        ];
                    }


                    //NUMERO DE OPORTUNIDADES POR ESTADO
                    $oportunidadEstado = [];
                    $oportunidades = OportunidadDeVenta::select('id_estado', \DB::raw('COUNT(*) as cantidad'))
                        ->groupBy('id_estado')
                        ->get();


                    foreach ($oportunidades as $oportunidad) {
                        $nombre = Estado::find($oportunidad['id_estado'])->nombre;
                        $oportunidadEstado[] = [
                            'name' => $nombre,
                            'y' => floatval($oportunidad['cantidad'])
                        ];
                    }

                    //NUMERO DE VENTAS POR ESTADO
                    $ventaEstado = [];
                    $ventas = Venta::select('id_estado', \DB::raw('COUNT(*) as cantidad'))
                        ->groupBy('id_estado')
                        ->get();


                    foreach ($ventas as $venta) {
                        $nombre = Estado::find($oportunidad['id_estado'])->nombre;
                        $ventaEstado[] = [
                            'name' => $nombre,
                            'y' => floatval($venta['cantidad'])
                        ];
                    }


                    //NUMERO DE ACTIVIDADES PROMEDIO POR OPORTUNIDAD DE VENTA

                    return view('home.index',['productos' => json_encode($productosTodosJs), 'nombreProductosTodos' => json_encode($nombreProductosTodos), 'data' => json_encode($points), 'lines' => json_encode($dataVentasMes), 'oportunidadEstado' => json_encode($oportunidadEstado), 'ventaEstado' => json_encode($ventaEstado)]);
                }
            }
        }


        return view('inicio');
    }
}
