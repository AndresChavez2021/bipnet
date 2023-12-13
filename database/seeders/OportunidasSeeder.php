<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;
use App\Models\User;
use App\Models\Cliente;
use App\Models\OportunidadDeVenta;
use Carbon\Carbon;

class OportunidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* $clientes = Cliente::inRandomOrder()->limit(10)->get();
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
        }*/
        //$estados = Estado::all();
        $estados = Estado::all()->where('tipo_O','1');
        $empleados = User::all();
        $clientes = Cliente::all();

            // Genera un número aleatorio entre 0 y el tamaño de la lista
        

        // Crea un nuevo modelo OportunidadDeVenta con los datos aleatorios
        for ($i = 0; $i < 700; $i++) {
            $estado_aleatorio = $estados->random();
            $empleado_aleatorio = $empleados->random();
            $cliente_aleatorio = $clientes->random();
            $startDate = Carbon::createFromDate(2020, 1, 1);
            $endDate = Carbon::createFromDate(2023, 12, 31);
            $randomAmount = rand(1000, 100000);
            // Generar una fecha aleatoria dentro del rango
            $randomDate = Carbon::createFromTimestamp(rand($startDate->getTimestamp(), $endDate->getTimestamp()));

            // Obtener una fecha de cierre aleatoria, sumando un mes a la fecha de inicio
            $randomClosingDate = $randomDate->copy()->addMonth(1);

    
            // Obtén el nombre del cliente y crea el nombre de la oportunidad
            $oportunidadData['nombre'] =  $cliente_aleatorio->nombre;
            // Crea un nuevo modelo OportunidadDeVenta con los datos aleatorios
            $oportunidad = OportunidadDeVenta::create([
                'nombre' => $oportunidadData['nombre'],
                'id_estado' => $estado_aleatorio->id,
                'id_empleado' => $empleado_aleatorio->id,
                'id_cliente' => $cliente_aleatorio->id,
                'fecha_inicio'=> $randomDate,
                'monto_esperado'=>$randomAmount,
                'fecha_estimada_cierre'=>$randomClosingDate,
            ]);
        }
    }
}
  

    

