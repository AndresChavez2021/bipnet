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

       /* foreach (range(1, 30) as $index) {
            Cliente::create([
                'nombre' => $faker->company,
                'info_contacto' => $faker->sentence,
                'correo' => $faker->unique()->safeEmail,
                'phone' => $faker->unique()->numerify('##########'), // Genera un número de teléfono aleatorio
            ]);
        }
        */
        //$faker = Faker::create();


        Cliente::create([
            'nombre' => 'La Nueva santa cruz',
            'info_contacto' => 'Manuel lopez',
            'correo' => 'manuel3@gmail.com',
            'phone' => $faker->unique()->numerify('##########'), // Genera un número de teléfono aleatorio
        ]);
        Cliente::create([
            'nombre' => 'Banco Fortaleza',
            'info_contacto' => 'Erick lopez',
            'correo' => 'Erick@gmail.com',
            'phone' => $faker->unique()->numerify('##########'), // Genera un número de teléfono aleatorio
        ]);
        Cliente::create([
            'nombre' => 'Banco Ganadero',
            'info_contacto' => 'gabriela mendoza',
            'correo' => 'gabriela@gmail.com',
            'phone' => $faker->unique()->numerify('##########'), // Genera un número de teléfono aleatorio
        ]);
        Cliente::create([
            'nombre' => 'Grupo la Fuente',
            'info_contacto' => 'Enrique ramos',
            'correo' => 'Enrique@gmail.com',
            'phone' => $faker->unique()->numerify('##########'), // Genera un número de teléfono aleatorio
        ]);
        Cliente::create([
            'nombre' => 'Incruz - Casa matriz',
            'info_contacto' => 'Manuel lopez',
            'correo' => 'Manuel7@gmail.com',
            'phone' => $faker->unique()->numerify('##########'), // Genera un número de teléfono aleatorio
        ]);
        Cliente::create([
            'nombre' => 'Incruz - Taller',
            'info_contacto' => 'Manuel lopez',
            'correo' => 'Manuel1@gmail.com',
            'phone' => $faker->unique()->numerify('##########'), // Genera un número de teléfono aleatorio
        ]);
        Cliente::create([
            'nombre' => 'Aduana Nacional',
            'info_contacto' => 'Felipe G',
            'correo' => 'Felipe@gmail.com',
            'phone' => $faker->unique()->numerify('##########'), // Genera un número de teléfono aleatorio
        ]);
        Cliente::create([
            'nombre' => 'Camaro Casa matriz',
            'info_contacto' => 'rodrigo A',
            'correo' => 'rodrigo@gmail.com',
            'phone' => $faker->unique()->numerify('##########'), // Genera un número de teléfono aleatorio
        ]);
        Cliente::create([
            'nombre' => 'Banco Fassil',
            'info_contacto' => 'miguel T',
            'correo' => 'miguel@gmail.com',
            'phone' => $faker->unique()->numerify('##########'), // Genera un número de teléfono aleatorio
        ]); 
        $clientes = [
            [
                'nombre' => 'Inversiones del Sur SRL',
                'info_contacto' => 'Carlos Montenegro',
                'correo' => 'info@inversionessur.com',
                'phone' => $faker->unique()->numerify('##########'),
            ],
            [
                'nombre' => 'Logística Integral SA',
                'info_contacto' => 'Ana Flores',
                'correo' => 'contacto@logisticaintegral.com',
                'phone' => $faker->unique()->numerify('##########'),
            ],
            [
                'nombre' => 'Tech Solutions Ltda.',
                'info_contacto' => 'Juan Pérez',
                'correo' => 'juan@techsolutions.com',
                'phone' => $faker->unique()->numerify('##########'),
            ],
            [
                'nombre' => 'Bolivia Tours & Travel',
                'info_contacto' => 'María Gonzales',
                'correo' => 'info@boliviatours.com',
                'phone' => $faker->unique()->numerify('##########'),
            ],
            [
                'nombre' => 'Inversiones Gastronómicas SA',
                'info_contacto' => 'Pedro Rodríguez',
                'correo' => 'pedro@inversionesgastronomicas.com',
                'phone' => $faker->unique()->numerify('##########'),
            ],
            [
                'nombre' => 'Consultoría Ambiental Verde',
                'info_contacto' => 'Laura López',
                'correo' => 'laura@ambientalverde.com',
                'phone' => $faker->unique()->numerify('##########'),
            ],
            [
                'nombre' => 'Imprenta Creativa Express',
                'info_contacto' => 'Gabriel Soto',
                'correo' => 'gabriel@imprentacreativa.com',
                'phone' => $faker->unique()->numerify('##########'),
            ],
            [
                'nombre' => 'Desarrollos Inmobiliarios del Norte',
                'info_contacto' => 'Silvia Mendoza',
                'correo' => 'silvia@inmobiliarianorte.com',
                'phone' => $faker->unique()->numerify('##########'),
            ],
            [
                'nombre' => 'Soluciones Informáticas Avanzadas',
                'info_contacto' => 'Fernando Vargas',
                'correo' => 'fernando@sia.com',
                'phone' => $faker->unique()->numerify('##########'),
            ],
            [
                'nombre' => 'Muebles y Decoración Elegante',
                'info_contacto' => 'Carmen Romero',
                'correo' => 'carmen@muebleselegantes.com',
                'phone' => $faker->unique()->numerify('##########'),
            ],
            // Agrega más clientes según sea necesario
        ];
        
        foreach ($clientes as $clienteData) {
            Cliente::create($clienteData);
        }
    }
}
