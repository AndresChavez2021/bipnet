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
            'nombre' => 'En espera',
            'tipo_O' => 1,
            'tipo_C' => 0,
            'tipo_V' => 1,
        ]);

        Estado::create([
            'nombre' => 'En ejecucion',
            'tipo_O' => 0,
            'tipo_C' => 1,
            'tipo_V' => 0,
        ]);
    }
}
