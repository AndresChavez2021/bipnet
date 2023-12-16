<?php

namespace App\Http\Controllers;

use App\Models\DetalleServicio;
use App\Models\Estado;
use App\Models\OportunidadDeVenta;
use App\Models\Producto_Servicio;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                    $oportunidades = OportunidadDeVenta::with('cotizaciones');
                    $oportunidadesValidadas = OportunidadDeVenta::where('id_estado', 7)->get();

                    $cotizaciones = $oportunidadesValidadas->load('cotizaciones');

                    $productosValidados = [];
                    foreach ($cotizaciones as $cotizacion) {
                        $detalles = $cotizacion->cotizaciones->load('detalles');
                        foreach ($detalles as $detalle) {
                            $productosValidados[] = $detalle->detalles;;
                        }
                    }

                    $ventas = OportunidadDeVenta::select(
                        'producto__servicios.id',
                        'producto__servicios.nombre as nombre',
                        DB::raw('SUM(detalle_servicios.cantidad * detalle_servicios.precio_venta) as total_precio_venta'),
                    )
                        ->join('cotizacions', 'oportunidad_de_ventas.id', '=', 'cotizacions.id_oportunidad')
                        ->join('detalle_servicios', 'cotizacions.id', '=', 'detalle_servicios.id_cotizacion')
                        ->join('producto__servicios', 'detalle_servicios.id_productos', '=', 'producto__servicios.id')
                        ->where('oportunidad_de_ventas.id_estado', 7)
                        ->where('oportunidad_de_ventas.fecha_inicio', '>', '2000-01-01')
                        ->where('oportunidad_de_ventas.fecha_inicio', '<', DB::raw('CURDATE()'))
                        ->groupBy('producto__servicios.id', 'producto__servicios.nombre')
                        ->orderByDesc('total_precio_venta')
                        ->get();

                    $productosTodos = DetalleServicio::selectRaw('id_productos, SUM(cantidad*precio_venta) as total_precio_venta')
                        ->groupBy('id_productos')
                        ->orderByDesc('total_precio_venta')
                        ->get();

                    $ventasTodos = [];
                    foreach ($ventas as $venta) {
                        //$nombre = Producto_Servicio::find($producto['id_productos'])->nombre;
                        $ventasTodos[] = [
                            'x' => $venta->nombre,
                            'value' => floatval($venta->total_precio_venta)
                        ];
                    }

                    //LOS 5 PRODUCTOS MAS VENDIDOS
                    $ventasCinco = OportunidadDeVenta::select(
                        'producto__servicios.id',
                        'producto__servicios.nombre as nombre',
                        DB::raw('SUM(detalle_servicios.cantidad * detalle_servicios.precio_venta) as total_precio_venta'),
                    )
                        ->join('cotizacions', 'oportunidad_de_ventas.id', '=', 'cotizacions.id_oportunidad')
                        ->join('detalle_servicios', 'cotizacions.id', '=', 'detalle_servicios.id_cotizacion')
                        ->join('producto__servicios', 'detalle_servicios.id_productos', '=', 'producto__servicios.id')
                        ->where('oportunidad_de_ventas.id_estado', 7)
                        ->where('oportunidad_de_ventas.fecha_inicio', '>', '2023-01-01')
                        ->where('oportunidad_de_ventas.fecha_inicio', '<', DB::raw('CURDATE()'))
                        ->groupBy('producto__servicios.id', 'producto__servicios.nombre')
                        ->orderByDesc('total_precio_venta')
                        ->limit(5)
                        ->get();

                    $pointsCinco = [];
                    foreach ($ventasCinco as $venta) {
                        $pointsCinco[] = [
                            'name' => $venta->nombre,
                            'y' => floatval($venta->total_precio_venta)
                        ];
                    }

                    //VENTAS POR MES DE LOS 5 ANTERIORES PRODUCTOS
/*
                    $matrizVentas = [];
                    $ventasCinco = OportunidadDeVenta::select(
                        'producto__servicios.id',
                        'producto__servicios.nombre as nombre',
                        DB::raw('SUM(detalle_servicios.cantidad * detalle_servicios.precio_venta) as total_precio_venta'),
                        'oportunidad_de_ventas.fecha_inicio'
                    )
                        ->join('cotizacions', 'oportunidad_de_ventas.id', '=', 'cotizacions.id_oportunidad')
                        ->join('detalle_servicios', 'cotizacions.id', '=', 'detalle_servicios.id_cotizacion')
                        ->join('producto__servicios', 'detalle_servicios.id_productos', '=', 'producto__servicios.id')
                        ->where('oportunidad_de_ventas.id_estado', 7)
                        ->where('oportunidad_de_ventas.fecha_inicio', '>', '2000-01-01')
                        ->where('oportunidad_de_ventas.fecha_inicio', '<', DB::raw('CURDATE()'))
                        ->groupBy('producto__servicios.id', 'producto__servicios.nombre', 'oportunidad_de_ventas.fecha_inicio')
                        ->orderByDesc('total_precio_venta')
                        ->limit(5)
                        ->get();
                    $dataVentasMes = [];
                    foreach ($ventas as $producto) {
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
*/

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
                    //'productosValidados'=>json_encode($productosValidados),

                    return view('home.index',[ 'cotizaciones'=>json_encode($ventasCinco), 'oportunidadVentas'=>json_encode($oportunidadesValidadas), 'productos' => json_encode($ventasTodos), 'nombreProductosTodos' => json_encode(''), 'data' => json_encode($pointsCinco), 'lines' => json_encode(''), 'oportunidadEstado' => json_encode($oportunidadEstado), 'ventaEstado' => json_encode($ventaEstado)]);
                }
            }
        }


        return view('inicio');
    }
}
