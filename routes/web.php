<?php

use App\Mail\EnviarCorreo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\VerParqueoController;
use App\Http\Controllers\ParkingSpaceController;
use App\Http\Controllers\Select2SearchController;
use App\Http\Controllers\VerParqueoZonaBController;
use App\Http\Controllers\ParkingSpaceZonaBController;
use App\Http\Controllers\RegisterAdmin\RegisterController;
use App\Http\Controllers\AdmInfoClientes\ClienteController;
use App\Http\Controllers\RegisterAdmin\VistaRegisterController;
use App\Http\Controllers\ConfiguracionParqueo\CrearSitioController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\AdmInfoClientes\ImportarClientesController;
use App\Http\Controllers\AtencionSolicitud\EnviarSolicitudController;
use App\Http\Controllers\ControlPagos\VisualizarListaPagosController;

use App\Http\Controllers\ProveerMensajes\MensajeController;


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
//Ruta lista mensaje
Route::get('/listamensaje',[MensajeController::class,'index'])->name('Mensaje.listamensaje');
Route::post('/ModalRegistrar',[MensajeController::class,'store'])->name('MensajesGlobales.registrarMen');
Route::post('/EnviarMensaje',[MensajeController::class,'send'])->name('MensajesGlobales.send');
Route::delete('/elimarmensaje',[MensajeController::class,'destroy'])->name('Mensaje.eliminar');
Route::put('/editardato/{id}',[MensajeController::class,'update'])->name('Mensaje.editardato');
Route::get('/MensajeFormulario',[MensajeController::class,'register'])->name('Mensaje.formulario');
Route::get('/EditarMensaje/{id}',[MensajeController::class,'edit'])->name('Mensaje.editarmensaje');
Route::get('/EnviarMensajeGlobal/{id}',[MensajeController::class,'sendGlobal'])->name('Mensaje.mensajeglobal');



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
    Route::get('/cerrarsesion', 'cerrarsesion')->name('cerrarsesion');
});

Route::resource('horario', HorarioController::class);
Route::controller(HorarioController::class)->group(function(){
    Route::get('lista', 'lista')->name('lista');
    Route::delete('eliminarhorario/{id}', 'destroy')->name('eliminarhorario');
    Route::put('editarhorario/{id}', 'update')->name('editarhorario');
    Route::get('horarioupdate/{id}', 'horarioupdate')->name('horarioupdate');
});

Route::controller(VehiculoController::class)->group(function(){
    Route::get('/listavehiculo', 'index')->name('listavehiculo');
    Route::get('/registrarvehiculo', 'registrar')->name('registrarvehiculo');
    Route::post('/agregarvehiculo', 'store')->name('agregarvehiculo');
    Route::get('/vistaeditarvehiculo/{id}', 'vistaeditar')->name('vistaeditarvehiculo');
    Route::put('/editarvehiculo/{id}', 'update')->name('editarvehiculo');
    Route::delete('eliminarvehiculo/{id}', 'destroy')->name('eliminarvehiculo');
    Route::get('/listaregistro', 'listaRegistro')->name('listaregistro');
});

Route::controller(RegistroController::class)->group(function(){
    Route::get('/listaregistro', 'index')->name('listaregistro');
    Route::post('/agregarregistro', 'store')->name('agregarregistro');
    Route::put('/editarregistro/{id}', 'update')->name('editarregistro');
    Route::get('/buscarplaca', 'buscarplaca')->name('buscarplaca');
});

Route::controller(CorreoController::class)->group(function(){
    Route::get('envcorreo', 'index')->name('envcorreo');
    Route::get('pago', 'crearpago')->name('pago');
});

Route::get('/prueba', function () {
    return view('vehiculo.pruebaeditar');
});
Route::get('/vistacorreo', function () {
    return view('vehiculo.prueba');
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

