<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleTurnoController;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoServicioController;
use App\Http\Controllers\OportunidadDeVentaController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\PronosticoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/register', [RegisterController::class, 'show']);

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show']);

Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::group(['middleware'=>['auth']], function(){
    route::resource('/empleados', EmpleadoController::class);
    route::resource('/clientes', ClienteController::class);
    route::resource('/users', UserController::class);
    route::resource('/perfil', PerfilController::class);
    route::resource('/password', PasswordController::class);
  
    route::resource('/roles', RolController::class);
    route::resource('/estados', EstadoController::class);
    route::resource('/categorias', CategoriaController::class);
    route::resource('/servicios', ProductoServicioController::class);
    route::resource('/oportunidades', OportunidadDeVentaController::class);
    route::resource('/actividades', ActividadController::class);
    route::resource('/cotizaciones', CotizacionController::class);
    /* PRONOSTICO */
    route::get('/pronostico-ventas', [PronosticoController::class,"indexPronosticoVenta"]);
    route::get('/pronostico-ventas/create', [PronosticoController::class,"createPronosticoVenta"])->name("pronostico-ventas.create");
    route::post('/pronostico-ventas/store', [PronosticoController::class,"storePronosticoVenta"])->name("pronostico-ventas.store");

});
