<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Actividad;
use App\Models\OportunidadDeVenta;
use Faker\Factory as Faker;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear instancias de Faker
        $faker = Faker::create();

        // Obtener IDs de oportunidad_de_ventas existentes
        $oportunidadIds = OportunidadDeVenta::pluck('id')->toArray();

        // Crear 50 actividades de ejemplo
        for ($i = 0; $i < 50; $i++) {
            Actividad::create([
                'nombre' => $faker->word,
                'fecha' => $faker->dateTimeThisMonth,
                'detalles' => $faker->paragraph,
                'id_oportunidad' => $faker->randomElement($oportunidadIds),
            ]);
        }
    }
}
