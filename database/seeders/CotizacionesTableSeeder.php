<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Cotizacion;

use App\Models\Estado;

use App\Models\OportunidadDeVenta;

class CotizacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$cantidadCotizaciones = 10;

        // Itera para crear cotizaciones
        /*for ($i = 1; $i <= $cantidadCotizaciones; $i++) {
            Cotizacion::create([
                'Codigo' => 'COD' . $i,
                'fecha' => now(),
                'monto_total' => rand(100, 1000),
                'id_oportunidad' => OportunidadDeVenta::pluck('id')->random(),
                'id_estado' => Estado::pluck('id')->random(),
            ]);
        }
        */
        $cantidadCotizaciones = 1000;// agregar la misma cantidad a detallesServicios

        $estados = Estado::all()->where('tipo_C','1');

        for ($i = 1; $i <= $cantidadCotizaciones; $i++) {
   
        $oportunidad = OportunidadDeVenta::inRandomOrder()->first(); // Obtén una oportunidad al azar

        Cotizacion::create([
        'Codigo' => 'COD' . $i,
        'fecha' => $oportunidad->fecha_inicio,
        'monto_total' => $oportunidad->monto_esperado,
        'id_oportunidad' => $oportunidad->id,
        'id_estado' => $estados->random()->id,
         
        ]);
        }
    }
}
