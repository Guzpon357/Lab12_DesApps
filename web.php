<?php

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

Route::resource('zapatos','App\Http\Controllers\ZapatosController');
Route::get('api/v1/zapatos','App\Http\Controllers\ZapatosController@getZapatos');


Route::resource('ventas','App\Http\Controllers\VentasController');
Route::get('api/v1/ventas','App\Http\Controllers\VentasController@getVentas');