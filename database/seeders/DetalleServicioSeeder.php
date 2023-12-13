<?php

namespace Database\Seeders;

use App\Models\DetalleServicio;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Datos estáticos para el seeder
        $productos = [3, 7, 12, 8, 6, 4, 9, 14, 11, 10, 1, 5, 13, 2, 1, 8, 14, 6, 12, 3, 9, 4, 11, 13, 7];
        $cotizaciones = [3, 7, 4, 8, 6, 9, 2, 10, 5, 1, 1, 8, 4, 7, 5, 3, 9, 2, 6, 10, 1, 5, 4, 9, 7];
        $precios = [6500, 2500, 8000, 3500, 7000, 8500, 4000, 6000, 9000, 7500, 3000, 8500, 9500, 5500];


        $fechaInicial = Carbon::parse('2023-01-01');
        $fechaFinal = Carbon::parse('2023-11-30');

        // Generar 25 filas con datos estáticos
        for ($i = 0; $i <= 24; $i++) {
            $detalleVenta = new DetalleServicio();
            $detalleVenta->id_productos = $productos[$i];
            $detalleVenta->id_cotizacion = $cotizaciones[$i];
            $detalleVenta->cantidad = rand(1, 3);
            $detalleVenta->precio_venta = $precios[$productos[$i]-1];
            $detalleVenta->created_at = $this->generateRandomDate($fechaInicial, $fechaFinal);
            $detalleVenta->updated_at = $detalleVenta->created_at;
            $detalleVenta->save();
        }
    }

    // Función para generar fechas aleatorias dentro del rango proporcionado
    private function generateRandomDate($startDate, $endDate)
    {
        $timestamp = mt_rand($startDate->timestamp, $endDate->timestamp);
        return Carbon::createFromTimestamp($timestamp)->format('Y-m-d H:i:s');
    }
}