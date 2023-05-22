<?php

use App\Http\Controllers\HorarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\VerParqueoController;
use App\Http\Controllers\VerParqueoZonaBController;
use App\Http\Controllers\ConfiguracionParqueo\CrearSitioController;
use App\Http\Controllers\AdmInfoClientes\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingSpaceController;
use App\Http\Controllers\ParkingSpaceZonaBController;
use App\Http\Controllers\RegisterAdmin\RegisterController;
use App\Http\Controllers\RegisterAdmin\VistaRegisterController;
use App\Http\Controllers\AdmInfoClientes\ImportarClientesController;
use App\Http\Controllers\AtencionSolicitud\EnviarSolicitudController;
use App\Http\Controllers\ControlPagos\VisualizarListaPagosController;

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
/*Usuario Cliente*/
Route::get('/inicio', function () {
    return view('Cliente.ClienteForm');
})->name('Cliente.ClienteForm');

Route::get('/', function () {
    return view('welcome');
});


//Rutas vilma

Route::post('/formulario',[ClienteController::class,'store'])->name('Cliente.guardar');
Route::get('/listacliente',[ClienteController::class,'index'])->name('Cliente.listacliente');
Route::get('/verform/{id}',[ClienteController::class,'edit'])->name('Cliente.verform');
Route::delete('/elimardato',[ClienteController::class,'destroy'])->name('Cliente.eliminar');
Route::put('/editardato/{id}',[ClienteController::class,'update'])->name('Cliente.editardato');
Route::post('/ModalImportar',[ImportarClientesController::class,'store'])->name('Cliente.importar');






//Rutas andrea

Route::resource('/sites', ParkingSpaceController::class);
/*Route::controller(CrearSitioController::class)->group(function(){
    Route::get('/ConfiguracionParqueo/crear', 'index');
});
*/
Route::resource('/siteszonab', ParkingSpaceZonaBController::class);



Route::resource('/crear', CrearSitioController::class);
Route::controller(CrearSitioController::class)->group(function(){

});






//Rutas luis
Route::controller(PruebaController::class)->group(function(){
    Route::get('/vistaejemplo', 'index');
});

Route::resource('/login', LoginController::class);
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login');
    Route::get('/loginhorario', 'store');
});

Route::resource('horario', HorarioController::class);
Route::controller(HorarioController::class)->group(function(){
    Route::get('lista', 'lista')->name('lista');
    Route::delete('eliminarhorario/{id}', 'destroy')->name('eliminarhorario');
    Route::put('editarhorario/{id}', 'update')->name('editarhorario');
    Route::get('horarioupdate/{id}', 'horarioupdate')->name('horarioupdate');
});









//rutas yohana
Route::controller(VerParqueoController::class)->group(function(){
    Route::get('/VerParqueo', 'index')->name('verparqueo');
});

//Route::resource('/VerParqueo', VerParqueoController::class);

Route::controller(VerParqueoZonaBController::class)->group(function(){
    Route::get('/VerParqueoZonaB', 'index')->name('verparqueozonab');
});










//rutas kevin
Route::get('/crear-cuenta', [RegisterController::class,'index'])->name('crearUser');
Route::post('/crear-cuenta', [RegisterController::class,'store'])->name('crearUser');

Route::get('/vista', [VistaRegisterController::class,'index'])->name('vistaRegister');

Route::get('/usuarios/{id}/edit', [VistaRegisterController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [VistaRegisterController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [VistaRegisterController::class, 'destroy'])->name('usuarios.destroy');


//Solicitud Parqueo

Route::resource('/enviarSolicitud', EnviarSolicitudController::class);


Route::resource('/visualizarPagos', VisualizarListaPagosController::class);

