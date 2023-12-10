<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto_Servicio;
use App\Models\Categoria;

class ProductoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = Categoria::all();

        Producto_Servicio::create([
            'nombre' => 'Cableado Estructurado para Redes',
            'descripcion' => 'Diseño e instalación de sistemas de cableado estructurado para redes de datos y voz.',
            'precio' => 6500.00,
            'id_categoria' => $categorias->where('nombre', 'Redes y Seguridad')->first()->id,
        ]);
        
        Producto_Servicio::create([
            'nombre' => 'Soporte Técnico Remoto',
            'descripcion' => 'Asistencia técnica remota para resolver problemas y brindar soporte a usuarios.',
            'precio' => 2500.00,
            'id_categoria' => $categorias->where('nombre', 'Soporte Técnico')->first()->id,
        ]);
        
        Producto_Servicio::create([
            'nombre' => 'Cableado Estructurado para Centros de Datos',
            'descripcion' => 'Implementación de sistemas de cableado estructurado específicos para centros de datos.',
            'precio' => 8000.00,
            'id_categoria' => $categorias->where('nombre', 'Redes y Seguridad')->first()->id,
        ]);
        
        Producto_Servicio::create([
            'nombre' => 'Soporte Técnico Presencial',
            'descripcion' => 'Asistencia técnica presencial para resolver problemas y realizar mantenimiento en el sitio.',
            'precio' => 3500.00,
            'id_categoria' => $categorias->where('nombre', 'Soporte Técnico')->first()->id,
        ]);
        Producto_Servicio::create([
            'nombre' => 'Desarrollo de Aplicaciones Móviles',
            'descripcion' => 'Desarrollo de aplicaciones móviles para plataformas iOS y Android.',
            'precio' => 7000.00,
            'id_categoria' => $categorias->where('nombre', 'Desarrollo de Software')->first()->id,
        ]);

        Producto_Servicio::create([
            'nombre' => 'Seguridad de Redes Empresariales',
            'descripcion' => 'Implementación de medidas para garantizar la seguridad de las redes empresariales.',
            'precio' => 8500.00,
            'id_categoria' => $categorias->where('nombre', 'Redes y Seguridad')->first()->id,
        ]);

        Producto_Servicio::create([
            'nombre' => 'Almacenamiento en la Nube Empresarial',
            'descripcion' => 'Soluciones de almacenamiento en la nube escalables para empresas.',
            'precio' => 4000.00,
            'id_categoria' => $categorias->where('nombre', 'Servicios en la Nube')->first()->id,
        ]);

        Producto_Servicio::create([
            'nombre' => 'Análisis de Datos Avanzado',
            'descripcion' => 'Servicio de análisis de datos con herramientas avanzadas para obtener insights valiosos.',
            'precio' => 6000.00,
            'id_categoria' => $categorias->where('nombre', 'Análisis de Datos')->first()->id,
        ]);

        Producto_Servicio::create([
            'nombre' => 'Inteligencia Artificial Personalizada',
            'descripcion' => 'Desarrollo e implementación de soluciones de inteligencia artificial adaptadas a las necesidades del cliente.',
            'precio' => 9000.00,
            'id_categoria' => $categorias->where('nombre', 'Inteligencia Artificial')->first()->id,
        ]);

        Producto_Servicio::create([
            'nombre' => 'Gestión de Proyectos Tecnológicos',
            'descripcion' => 'Asesoramiento y gestión de proyectos tecnológicos para asegurar el éxito y la eficiencia.',
            'precio' => 7500.00,
            'id_categoria' => $categorias->where('nombre', 'Gestión de Proyectos')->first()->id,
        ]);

        Producto_Servicio::create([
            'nombre' => 'Soporte Técnico Especializado',
            'descripcion' => 'Servicio de soporte técnico especializado para resolver problemas y garantizar el funcionamiento óptimo de los sistemas.',
            'precio' => 3000.00,
            'id_categoria' => $categorias->where('nombre', 'Soporte Técnico')->first()->id,
        ]);

        Producto_Servicio::create([
            'nombre' => 'Consultoría IT Estratégica',
            'descripcion' => 'Consultoría estratégica en tecnologías de la información para optimizar procesos y recursos.',
            'precio' => 8500.00,
            'id_categoria' => $categorias->where('nombre', 'Consultoría IT')->first()->id,
        ]);

        Producto_Servicio::create([
            'nombre' => 'Seguridad Cibernética Avanzada',
            'descripcion' => 'Soluciones avanzadas de seguridad cibernética para proteger la infraestructura y los datos empresariales.',
            'precio' => 9500.00,
            'id_categoria' => $categorias->where('nombre', 'Ciberseguridad')->first()->id,
        ]);

        Producto_Servicio::create([
            'nombre' => 'Desarrollo Web Profesional',
            'descripcion' => 'Diseño y desarrollo web profesional con las últimas tecnologías y mejores prácticas.',
            'precio' => 5500.00,
            'id_categoria' => $categorias->where('nombre', 'Desarrollo Web')->first()->id,
        ]);

    }
}
