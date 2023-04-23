<?php

use App\Http\Controllers\PruebaController;
Use App\Http\Controllers\ConfiguracionParqueo\CrearSitioController;
Use App\Http\Controllers\VerParqueoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingSpaceController;

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


Route::resource('/sites', ParkingSpaceController::class);
/*Route::controller(CrearSitioController::class)->group(function(){
    Route::get('/ConfiguracionParqueo/crear', 'index');
    
});
*/

Route::resource('/crear', CrearSitioController::class);

Route::controller(VerParqueoController::class)->group(function(){
    Route::get('/VerParqueo', 'index');
});
