<?php

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
