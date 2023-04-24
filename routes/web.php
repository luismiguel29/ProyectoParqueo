<?php

use App\Http\Controllers\HorarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\VerParqueoController;
use App\Http\Controllers\ConfiguracionParqueo\CrearSitioController;
use App\Http\Controllers\AdmInfoClientes\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingSpaceController;
use App\Http\Controllers\RegisterAdmin\RegisterController;
use App\Http\Controllers\RegisterAdmin\VistaRegisterController;

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
Route::get('/lista',[ClienteController::class,'index'])->name('Cliente.lista');
Route::get('/verform/{id}',[ClienteController::class,'edit'])->name('Cliente.verform');
Route::delete('/elimardato',[ClienteController::class,'destroy'])->name('Cliente.eliminar');
Route::put('/editardato/{id}',[ClienteController::class,'update'])->name('Cliente.editardato');







//Rutas andrea

Route::resource('/sites', ParkingSpaceController::class);
/*Route::controller(CrearSitioController::class)->group(function(){
    Route::get('/ConfiguracionParqueo/crear', 'index');

});
*/
Route::resource('/crear', CrearSitioController::class);







//Rutas luis
Route::controller(PruebaController::class)->group(function(){
    Route::get('/vistaejemplo', 'index');
});

Route::resource('/login', LoginController::class);
Route::controller(LoginController::class)->group(function(){
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









//rutas kevin
Route::get('/crear-cuenta', [RegisterController::class,'index'])->name('crearUser');
Route::post('/crear-cuenta', [RegisterController::class,'store'])->name('crearUser');

Route::get('/vista', [VistaRegisterController::class,'index'])->name('vistaRegister');

Route::get('/usuarios/{id}/edit', [VistaRegisterController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [VistaRegisterController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [VistaRegisterController::class, 'destroy'])->name('usuarios.destroy');


