<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//Route::resource('Vehiculo','VehiculoController');
Route::get('/', function () {
    return view('auth/login');
});

Route::get('/tarifa', 'TarifaController@index')->name('tarifa');
Route::resource('Vehiculo', 'VehiculoController');
Route::resource('tarifa', 'TarifaController');
Auth::routes();

Route::get('/Vehiculo', 'VehiculoController@index')->name('Vehiculo');

Route::resource('ingresoV', 'Ingreso_vehiculoController');
Route::resource('ticket', 'TicketController');

Route::resource('tarifa', 'TarifaController');
