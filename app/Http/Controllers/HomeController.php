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
    public function index(Request $request)
    {

        if ($request->has('fechaInicio') && $request->has('fechaFin')) {
            $fechaInicio = $request->fechaInicio;
            $fechaFin = $request->fechaFin;
        } else {
            $fechaInicio = '2000-01-01';
            $fechaFin = DB::raw('CURRENT_DATE');
        }

        if (auth()->user()) {
            $TipoV = auth()->user()->tipoV;
            $TipoG = auth()->user()->tipoG;
            if ($TipoV == 1) {
                return view('inicio');
            } else {
                if ($TipoG == 1) {

                    // VENTA DE TODOS LOS PRODUCTOS
                    $ventas = OportunidadDeVenta::select(
                        'producto__servicios.id',
                        'producto__servicios.nombre as nombre',
                        DB::raw('SUM(detalle_servicios.cantidad * detalle_servicios.precio_venta) as total_precio_venta')
                    )
                        ->join('cotizacions', 'oportunidad_de_ventas.id', '=', 'cotizacions.id_oportunidad')
                        ->join('detalle_servicios', 'cotizacions.id', '=', 'detalle_servicios.id_cotizacion')
                        ->join('producto__servicios', 'detalle_servicios.id_productos', '=', 'producto__servicios.id')
                        ->where('oportunidad_de_ventas.id_estado', 3)
                        ->where('oportunidad_de_ventas.fecha_inicio', '>', '2000-01-01')
                        ->where('oportunidad_de_ventas.fecha_inicio', '<', DB::raw('CURRENT_DATE'))
                        ->groupBy('producto__servicios.id', 'producto__servicios.nombre')
                        ->orderByDesc('total_precio_venta')
                        ->get();

                    $ventasTodos = [];
                    foreach ($ventas as $venta) {
                        $ventasTodos[] = [
                            'x' => $venta->nombre,
                            'value' => floatval($venta->total_precio_venta)
                        ];
                    }

                    // LOS 5 PRODUCTOS MÁS VENDIDOS
                    $ventasCinco = OportunidadDeVenta::select(
                        'producto__servicios.id',
                        'producto__servicios.nombre as nombre',
                        DB::raw('SUM(detalle_servicios.cantidad * detalle_servicios.precio_venta) as total_precio_venta')
                    )
                        ->join('cotizacions', 'oportunidad_de_ventas.id', '=', 'cotizacions.id_oportunidad')
                        ->join('detalle_servicios', 'cotizacions.id', '=', 'detalle_servicios.id_cotizacion')
                        ->join('producto__servicios', 'detalle_servicios.id_productos', '=', 'producto__servicios.id')
                        ->where('oportunidad_de_ventas.id_estado',3)
                        ->where('oportunidad_de_ventas.fecha_inicio', '>', $fechaInicio)
                        ->where('oportunidad_de_ventas.fecha_inicio', '<', $fechaFin)
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

                    // VENTAS POR MES DE LOS 5 ANTERIORES PRODUCTOS
                    $matrizVentas = [];

                    foreach ($ventasCinco as $venta) {
                        $nombreProducto = $venta->nombre;
                        $ventaProducto = self::obtenerVentasPorMesYAnho($venta->id);
                        
                        $matrizVentas[] = [
                            'name' => $nombreProducto,
                            'data' => $ventaProducto
                        ];
                    }
                    //dd($matrizVentas );

                    // NUMERO DE OPORTUNIDADES POR ESTADO
                    $oportunidadEstado = [];
                    $oportunidades = OportunidadDeVenta::select('id_estado', DB::raw('COUNT(*) as cantidad'))
                        ->groupBy('id_estado')
                        ->where('oportunidad_de_ventas.fecha_inicio', '>', $fechaInicio)
                        ->where('oportunidad_de_ventas.fecha_inicio', '<', $fechaFin)
                        ->get();

                    $prospectos = OportunidadDeVenta::where('id_estado', '2')
                        ->where('oportunidad_de_ventas.fecha_inicio', '>', $fechaInicio)
                        ->where('oportunidad_de_ventas.fecha_inicio', '<', $fechaFin)
                        ->count();
                    $enProceso = OportunidadDeVenta::where('id_estado', '1')
                        ->where('oportunidad_de_ventas.fecha_inicio', '>', $fechaInicio)
                        ->where('oportunidad_de_ventas.fecha_inicio', '<', $fechaFin)
                        ->count();
                    $completados = OportunidadDeVenta::where('id_estado', '3')
                        ->where('oportunidad_de_ventas.fecha_inicio', '>', $fechaInicio)
                        ->where('oportunidad_de_ventas.fecha_inicio', '<', $fechaFin)
                        ->count();

                    foreach ($oportunidades as $oportunidad) {
                        $nombre = Estado::find($oportunidad['id_estado'])->nombre;
                        $oportunidadEstado[] = [
                            'name' => $nombre,
                            'y' => floatval($oportunidad['cantidad'])
                        ];
                    }

                    // NUMERO DE VENTAS POR ESTADO
                    $ventaEstado = [];
                    $ventas = Venta::select('ventas.id_estado', DB::raw('COUNT(*) as cantidad'))
                        ->join('oportunidad_de_ventas', 'ventas.id_oportunidad', '=', 'oportunidad_de_ventas.id')
                        ->groupBy('ventas.id_estado')
                        ->where('oportunidad_de_ventas.fecha_inicio', '>', $fechaInicio)
                        ->where('oportunidad_de_ventas.fecha_inicio', '<', $fechaFin)
                        ->get();

                    foreach ($ventas as $venta) {
                        $nombre = Estado::find($venta['id_estado'])->nombre;
                        $ventaEstado[] = [
                            'name' => $nombre,
                            'y' => floatval($venta['cantidad'])
                        ];
                    }

                    return view('home.index', [
                        'prospectos' => $prospectos,
                        'enProceso' => $enProceso,
                        'cerrados' => $completados,
                        'productos' => json_encode($ventasTodos),
                        'data' => json_encode($pointsCinco),
                        'lines' => json_encode($matrizVentas),
                        'oportunidadEstado' => json_encode($oportunidadEstado),
                        'ventaEstado' => json_encode($ventaEstado)
                    ]);
                }
            }
        }

        return view('inicio');
    }

    public static function obtenerVentasPorMesYAnho($idProducto)
{
    $ventasPorMes = [];

    for ($mes = 1; $mes <= 12; $mes++) {
        $ventas = Producto_Servicio::select(
            'producto__servicios.id',
            'producto__servicios.nombre',
            DB::raw('SUM(detalle_servicios.cantidad * detalle_servicios.precio_venta) as venta'),
            DB::raw('EXTRACT(YEAR FROM oportunidad_de_ventas.fecha_inicio) as anho')
        )
            ->join('detalle_servicios', 'producto__servicios.id', '=', 'detalle_servicios.id_productos')
            ->join('cotizacions', 'detalle_servicios.id_cotizacion', '=', 'cotizacions.id')
            ->join('oportunidad_de_ventas', 'cotizacions.id_oportunidad', '=', 'oportunidad_de_ventas.id')
            ->where('producto__servicios.id', $idProducto)
            ->whereRaw('EXTRACT(YEAR FROM oportunidad_de_ventas.fecha_inicio) = ?', [2023])
            ->whereRaw('EXTRACT(MONTH FROM oportunidad_de_ventas.fecha_inicio) = ?', [$mes])
            ->groupBy('producto__servicios.id', 'producto__servicios.nombre', 'anho')
            ->get();

        $ventasPorMes[] = $ventas->isEmpty() ? floatval(0) :  floatval($ventas->first()->venta);
    }

    return $ventasPorMes;
}

}
