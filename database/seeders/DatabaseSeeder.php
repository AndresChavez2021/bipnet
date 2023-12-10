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
    }
}
