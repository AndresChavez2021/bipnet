<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use Faker\Factory as Faker;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_BO'); // Configurar Faker para español de Bolivia

        foreach (range(1, 30) as $index) {
            Cliente::create([
                'nombre' => $faker->company,
                'info_contacto' => $faker->sentence,
                'correo' => $faker->unique()->safeEmail,
                'phone' => $faker->unique()->numerify('##########'), // Genera un número de teléfono aleatorio
            ]);
        }
    }
}
