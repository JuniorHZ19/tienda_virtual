<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\Controllercliente;
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


Route::get('/cliente', [Controllercliente::class,"index"]);

Route::get('/Compra', [AlumnoController::class,"CompraView"])->name('Compra');

Route::get('/Venta',[AlumnoController::class,"VentaView"])->name('Venta');











