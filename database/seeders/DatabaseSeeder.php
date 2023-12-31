<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(EmpleadoSeeder::class);
        //$this->call(ClienteSeeder::class);
       
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(ProductoServicioSeeder::class);
        $this->call(ClientesTableSeeder::class);
        $this->call(OportunidasSeeder::class);
        $this->call(ActividadSeeder::class);
        $this->call(CotizacionesTableSeeder::class);
        $this->call(DetalleServicioSeeder::class);
        $this->call(VentasSeeder::class);
        
    }
}
