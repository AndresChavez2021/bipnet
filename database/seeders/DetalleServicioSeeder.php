<?php

namespace Database\Seeders;

use App\Models\DetalleServicio;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto_Servicio;
use App\Models\Cotizacion;

class DetalleServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cantidad_de_detalle = 100;// misma cantidad de cotizaciones

        // Obtén una cotización aleatoria


        $productos = Producto_Servicio::all();
        $productosElegidos='';

        for ($i = 0; $i < $cantidad_de_detalle; $i++) {
            $cotizacion = Cotizacion::inRandomOrder()->first();
            $productosElegidos = obtenerProductosParaMonto($productos, $cotizacion->monto_total);
            foreach( $productosElegidos as $producto_servicio)
                DetalleServicio::create([
                    'id_cotizacion' => $cotizacion->id,
                    'id_productos' => $producto_servicio['id'],
                    'cantidad' => '1',
                    'precio_venta' =>  $producto_servicio['precio'],
                ]);
        }



    }
}

function obtenerProductosParaMonto($productos, $montoDeseado)
{
    $productosElegidos = [];
    $montoActual = 0;

    while ($montoActual < $montoDeseado) {
        // Obtén un producto aleatorio
        $producto = $productos->random();

        // Verifica si agregar el producto supera el monto deseado
        if ($montoActual + $producto->precio > $montoDeseado) {
            // Si agregar el producto supera el monto deseado, detén el bucle
            break;
        }

        // Agrega el ID y el precio del producto al array
        $productosElegidos[] = [
            'id' => $producto->id,
            'precio' => $producto->precio,
        ];

        // Actualiza el monto actual
        $montoActual += $producto->precio;
    }

    return $productosElegidos;
}
