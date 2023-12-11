<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;
use App\Models\User;
use App\Models\Cliente;
use App\Models\OportunidadDeVenta;

class OportunidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = Cliente::inRandomOrder()->limit(10)->get();
        $empleados = User::where('tipoV', '1')->inRandomOrder()->limit(5)->get();
        $estados = Estado::inRandomOrder()->limit(3)->get();
        for ($i = 1; $i <= 20; $i++) {
            OportunidadDeVenta::create([
                'nombre' => "Oportunidad $i",
                'fecha_inicio' => now(),
                'monto_esperado' => rand(1000, 10000),
                'fecha_estimada_cierre' => now()->addDays(rand(1, 30)),
                'id_cliente' => $clientes->random()->id,
                'id_empleado' =>'1',
                'id_estado' => $estados->random()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
