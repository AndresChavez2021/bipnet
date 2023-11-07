<?php

namespace Database\Seeders;

use App\Models\Turno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Turno::create([
            'name' => 'Diurno',
            'horaini' => '08:00',
            'horafin' => '12:00'
        ]);

        Turno::create([
            'name' => 'Medio día',
            'horaini' => '13:00',
            'horafin' => '16:00'
        ]);
    }
}
