<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;
use App\Models\User;
use App\Models\Cliente;
use App\Models\OportunidadDeVenta;
use App\Models\Venta;

class VentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        for ($i = 0; $i < 700; $i++) {
            $oportunidad = OportunidadDeVenta::whereHas('estado', function ($query) {
                $query->where('nombre', 'cerrada Ganada');
            })->inRandomOrder()->first();

            $estados = Estado::all()->where('tipo_V','1');
            //$oportunidad = OportunidadDeVenta::inRandomOrder()->first();
            $cliente= $oportunidad->id_cliente;
            $empledado=$oportunidad->id_empleado;
            $fecha=$oportunidad->fecha_estimada_cierre;
            $monto=$oportunidad->monto_esperado;
            Venta::create([
                'Codigo'=>'V00'. $i,
                'fecha'=>$fecha,
                'monto_total'=>$monto,
                'id_cliente'=>$cliente,
                'id_empleado'=>$empledado,
                'id_oportunidad'=>$oportunidad->id,
                'id_estado' => $estados->random()->id,

            ]);
        }

    }
}
