<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Api\ProductoControllerApi;
use App\Http\Controllers\Api\P;
use App\Http\Controllers\Api\ProvedorControllerApi;
use App\Http\Controllers\Api\UserControllerApi;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function(){


  Route::middleware(['auth:sanctum','RolesApi:administrador,moderador'])->group(function(){
    Route::get('/productos',[ProductoControllerApi::class, 'index']);
    Route::post('/productos',[ProductoControllerApi::class, 'store']);
    Route::get('/productos/{id}',[ProductoControllerApi::class, 'show']);
    Route::put('/productos/{id}',[ProductoControllerApi::class, 'update']);

  });

    Route::middleware(['auth:sanctum','RolesApi:administrador'])->group(function(){
       Route::delete('/productos/{id}',[ProductoControllerApi::class, 'destroy']);
      });

});


Route::get('/provedores',[ProvedorControllerApi::class, 'index']);


//autentificacion usuario:
    
Route::post('/user/login',[UserControllerApi::class, 'login']);

Route::middleware(['auth:sanctum','RolesApi:administrador'])->post('/user/register',[UserControllerApi::class, 'register']);


Route::middleware('auth:sanctum')->get('/user/perfil',[UserControllerApi::class, 'perfil']);

Route::middleware('auth:sanctum')->get('/user/logout',[UserControllerApi::class, 'logout']);