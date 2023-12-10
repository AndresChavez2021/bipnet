<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['nombre' => 'Desarrollo de Software']);
        Categoria::create(['nombre' => 'Redes y Seguridad']);
        Categoria::create(['nombre' => 'Servicios en la Nube']);
        Categoria::create(['nombre' => 'Análisis de Datos']);
        Categoria::create(['nombre' => 'Inteligencia Artificial']);
        Categoria::create(['nombre' => 'Gestión de Proyectos']);
        Categoria::create(['nombre' => 'Soporte Técnico']);
        Categoria::create(['nombre' => 'Consultoría IT']);
        Categoria::create(['nombre' => 'Ciberseguridad']);
        Categoria::create(['nombre' => 'Desarrollo Web']);
    
    }
}
