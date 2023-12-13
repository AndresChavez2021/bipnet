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
        Estado::create([
            'nombre' => 'en proceso',
        ]);

        Estado::create([
            'nombre' => 'cerrado Ganado',
        ]);
       
        Estado::create([
            'nombre' => 'facturado',
        ]);

        Estado::create([
            'nombre' => 'cotizacion',
        ]);
        
        Estado::create([
            'nombre' => 'prospectos',
        ]);
    }
}
