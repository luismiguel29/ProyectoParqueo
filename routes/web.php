<?php

use App\Http\Controllers\HorarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PruebaController;
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


Route::resource('/login', LoginController::class);
Route::controller(LoginController::class)->group(function(){
    Route::get('/loginhorario', 'store');
});

Route::resource('horario', HorarioController::class);
Route::controller(HorarioController::class)->group(function(){
    
});

Route::get('/plantilla', function () {return view('plantilla');});
Route::get('/horario', function () {return view('horario.horario');});
Route::get('/listahorario', function () {return view('horario.listahorario');});