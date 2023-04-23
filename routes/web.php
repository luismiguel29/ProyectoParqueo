<?php

use App\Http\Controllers\HorarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\AdmInfoClientes\ClienteController;
use Illuminate\Support\Facades\Route;

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
    return view('layout.welcome');
});

Route::post('/formulario',[ClienteController::class,'store'])->name('Cliente.guardar');
Route::get('/lista',[ClienteController::class,'index'])->name('Cliente.lista');
Route::get('/verform/{id}',[ClienteController::class,'edit'])->name('Cliente.verform');
Route::delete('/elimardato',[ClienteController::class,'destroy'])->name('Cliente.eliminar');
Route::put('/editardato/{id}',[ClienteController::class,'update'])->name('Cliente.editardato');

Route::controller(PruebaController::class)->group(function(){
    Route::get('/vistaejemplo', 'index');
});


Route::resource('/login', LoginController::class);
Route::controller(LoginController::class)->group(function(){
    Route::get('/loginhorario', 'store');
});

Route::resource('horario', HorarioController::class);
/* Route::get('lista', [HorarioController::class, 'lista'])->name('lista');
Route::delete('eliminarhorario\{id}', [HorarioController::class, 'destroy'])->name('eliminarhorario'); */
Route::controller(HorarioController::class)->group(function(){
    Route::get('lista', 'lista')->name('lista');
    Route::delete('eliminarhorario/{id}', 'destroy')->name('eliminarhorario');
    Route::put('editarhorario/{id}', 'update')->name('editarhorario');
    Route::get('horarioupdate/{id}', 'horarioupdate')->name('horarioupdate');
});


