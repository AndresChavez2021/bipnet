<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Estados para las oportunidades de venta
        Estado::create([
            'nombre' => 'en proceso',
            'tipo_O' => '1',
            'tipo_C' => '0',
            'tipo_V' => '0',
        ]);
        Estado::create([
            'nombre' => 'prospectos',
            'tipo_O' => '1',
            'tipo_C' => '0',
            'tipo_V' => '0',
        ]);
        Estado::create([
            'nombre' => 'cerrada Ganada',
            'tipo_O' => '1',
            'tipo_C' => '0',
            'tipo_V' => '0',
        ]);

        Estado::create([
            'nombre' => 'cancelado Perdida',
            'tipo_O' => '1',
            'tipo_C' => '0',
            'tipo_V' => '0',
        ]);
        // Estados para la oportunidad y la venta facturada
        Estado::create([

            'nombre' => 'pendiente',
            'tipo_O' => '0',
            'tipo_C' => '0',
            'tipo_V' => '1',

        ]);

        Estado::create([

            'nombre' => 'cancelado',
            'tipo_O' => '0',
            'tipo_C' => '0',
            'tipo_V' => '1',

        ]);

        Estado::create([

            'nombre' => 'facturado',
            'tipo_O' => '1',
            'tipo_C' => '0',
            'tipo_V' => '1',

        ]);



        //Estados para las Cotizaciones
        Estado::create([
            'nombre' => 'cotizacion',
            'tipo_O' => '0',
            'tipo_C' => '1',
            'tipo_V' => '0',
        ]);

        Estado::create([
            'nombre' => 'cotizacion aceptada',
            'tipo_O' => '0',
            'tipo_C' => '1',
            'tipo_V' => '0',
        ]);

        Estado::create([
            'nombre' => 'cotizacion rechazada',
            'tipo_O' => '0',
            'tipo_C' => '1',
            'tipo_V' => '0',
        ]);


    }
}
