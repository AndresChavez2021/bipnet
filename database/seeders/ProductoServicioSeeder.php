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
        $categoriaId = 11; // Asigna el ID de la categoría deseada

        $productos = [
            [
                'nombre' => 'Punto de Acceso Wi-Fi',
                'descripcion' => 'Marca: NetLink. Estándar: 802.11ac. Frecuencia: 2.4 GHz y 5 GHz.',
                'precio' => 80.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Router Gigabit Ethernet',
                'descripcion' => 'Marca: SpeedNet. Puertos: 4 puertos LAN Gigabit, 1 puerto WAN Gigabit. Tecnología MU-MIMO.',
                'precio' => 120.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Switch Ethernet Administrable',
                'descripcion' => 'Marca: SwitchMaster. Puertos: 24 puertos Gigabit Ethernet. Administración web.',
                'precio' => 250.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Repetidor Wi-Fi',
                'descripcion' => 'Marca: ExtendLink. Amplifica la señal Wi-Fi. Frecuencia: 2.4 GHz.',
                'precio' => 50.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Firewall Empresarial',
                'descripcion' => 'Marca: SecureGuard. Protección contra amenazas cibernéticas. Administración centralizada.',
                'precio' => 500.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Router VPN Empresarial',
                'descripcion' => 'Marca: VPNMaster. Conexiones VPN seguras. Soporte para túneles IPsec.',
                'precio' => 180.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Switch PoE (Power over Ethernet)',
                'descripcion' => 'Marca: PowerLink. Puertos: 8 puertos PoE. Potencia total: 120W.',
                'precio' => 150.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Antena Direccional de Alta Ganancia',
                'descripcion' => 'Marca: SignalBoost. Ganancia: 18 dBi. Frecuencia: 5 GHz.',
                'precio' => 90.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Gateway VoIP',
                'descripcion' => 'Marca: VoIPConnect. Convierte llamadas a través de Internet. Soporte para SIP.',
                'precio' => 100.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Adaptador Ethernet USB 3.0',
                'descripcion' => 'Marca: SpeedLink. Velocidad: 1 Gbps. Conexión USB 3.0.',
                'precio' => 25.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Access Point Exterior Resistente a la Intemperie',
                'descripcion' => 'Marca: WeatherGuard. Estándar: 802.11n. Protección IP67.',
                'precio' => 120.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Kit de Herramientas de Red',
                'descripcion' => 'Marca: NetToolKit. Incluye alicates, probador de cables, destornilladores, etc.',
                'precio' => 40.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Router Inalámbrico Mesh',
                'descripcion' => 'Marca: MeshMaster. Tecnología de malla para una cobertura Wi-Fi completa.',
                'precio' => 160.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Cable de Red Cat6',
                'descripcion' => 'Marca: FastLink. Longitud: 15 metros. Cumple con estándares Cat6.',
                'precio' => 15.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Panel de Conexión Patch Panel',
                'descripcion' => 'Marca: PatchPro. 24 puertos. Para montaje en rack.',
                'precio' => 60.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Amplificador de Señal de Red',
                'descripcion' => 'Marca: SignalBoost. Mejora la señal Wi-Fi en áreas de baja cobertura.',
                'precio' => 70.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Tarjeta de Red PCIe Gigabit',
                'descripcion' => 'Marca: SpeedLink. Interfaz PCIe. Velocidad: 1 Gbps.',
                'precio' => 30.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Switch Industrial para Montaje en Riel DIN',
                'descripcion' => 'Marca: RailSwitch. Puertos: 8 puertos Ethernet industriales. Alimentación redundante.',
                'precio' => 300.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Router Inalámbrico 4G LTE',
                'descripcion' => 'Marca: LTEConnect. Conexión de banda ancha móvil. Antenas externas.',
                'precio' => 200.00,
                'id_categoria' => $categoriaId,
            ],
            [
                'nombre' => 'Kit de Herramientas de Crimpado RJ45',
                'descripcion' => 'Marca: CrimpPro. Incluye herramienta de crimpado, conectores RJ45 y probador de cables.',
                'precio' => 35.00,
                'id_categoria' => $categoriaId,
            ],
        ];

        foreach ($productos as $productoData) {
            Producto_Servicio::create($productoData);
        }

    }
}
