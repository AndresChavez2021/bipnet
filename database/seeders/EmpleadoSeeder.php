<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Administrador',
            'apellidos' => '',
            'email' => 'admin@gmail.com',
            'password' => '123456',
            'ci' => '9866021',
            'sexo' => 'M',
            'phone' => '60522212',
            'domicilio' => 'Santa Cruz',
            'estado' => '1',
            'tipoV' => '0',
            'tipoG' => '1',
        ]);
        User::create([
            'name' => 'Andres',
            'apellidos' => 'Chavez',
            'email' => 'andres@bipnet.com',
            'password' => '12345678',
            'ci' => '827483',
            'sexo' => 'M',
            'phone' => '605222',
            'domicilio' => 'Santa Cruz',
            'estado' => '1',
            'tipoV' => '0',
            'tipoG' => '1',
        ]);

        User::create([
            'name' => 'Steven',
            'apellidos' => 'Valverde',
            'email' => 'steven@bipnet.com',
            'password' => '123456',
            'ci' => '98660244',
            'sexo' => 'M',
            'phone' => '60522214',
            'domicilio' => 'Santa Cruz',
            'estado' => '1',
            'tipoV' => '0',
            'tipoG' => '1',
        ]);
        
        User::create([
            'name' => 'mijael',
            'apellidos' => 'perales',
            'email' => 'mijael@bipnet.com',
            'password' => '123456',
            'ci' => '9866022',
            'sexo' => 'M',
            'phone' => '60522211',
            'domicilio' => 'Santa Cruz',
            'estado' => '1',
            'tipoV' => '1',
            'tipoG' => '0',
        ]);

        User::create([
            'name' => 'Mauricio',
            'apellidos' => 'nogales',
            'email' => 'Mauricio@bipnet.com',
            'password' => '123456',
            'ci' => '9866023',
            'sexo' => 'M',
            'phone' => '60522213',
            'domicilio' => 'Santa Cruz',
            'estado' => '0',
            'tipoV' => '1',
            'tipoG' => '0',
        ]);

        User::create([
            'name' => 'Fabian',
            'apellidos' => '',
            'email' => 'Fabian@bipnet.com',
            'password' => '123456',
            'ci' => '9866343',
            'sexo' => 'M',
            'phone' => '6052265',
            'domicilio' => 'Santa Cruz',
            'estado' => '0',
            'tipoV' => '1',
            'tipoG' => '0',
        ]);
       
    }
}
