<?php

use App\Http\Controllers\PruebaController;
use App\Http\Controllers\RegisterAdmin\RegisterController;
use App\Http\Controllers\RegisterAdmin\VistaRegisterController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(PruebaController::class)->group(function(){
    Route::get('/vistaejemplo', 'index');
});

Route::get('/crear-cuenta', [RegisterController::class,'index'])->name('crearUser');
Route::post('/crear-cuenta', [RegisterController::class,'store'])->name('crearUser');

Route::get('/vista', [VistaRegisterController::class,'index'])->name('vistaRegister');

Route::get('/usuarios/{id}/edit', [VistaRegisterController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [VistaRegisterController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [VistaRegisterController::class, 'destroy'])->name('usuarios.destroy');

