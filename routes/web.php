<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\Controllercliente;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\provedorController;
use App\Http\Controllers\ImagenProductoController;
use App\Http\Controllers\SuministroController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
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


//home:
Route::middleware('autorisacion')->get('/home',[LoginController::class,"home"])->name('home');

//LOGIN:


Route::get('/login',[LoginController::class,"index"])->name('login.index');
Route::post('/login',[LoginController::class,"login"])->name('login.login');
Route::get('/register',[LoginController::class,"registerShow"])->name('login.registerShow');
Route::post('/register',[LoginController::class,"register"])->name('login.register');
Route::get('/logout',[LoginController::class,"logout"])->name('login.logout');




//Route::resource('clientes',clienteController::class);

Route::middleware('autorisacion')->group(function () {
 //Rol

  Route::middleware('roles:administrador')->resource('roles',RolController::class);

  //Cliente:

 Route::middleware('roles:administrador,moderador')->group(function () {

  Route::get('/clientes', [clienteController::class,"index"])->name('clientes.index');

  Route::get('/clientes/create',[clienteController::class,"create"])->name('clientes.create');

  Route::post('/clientes',[clienteController::class,"store"])->name('clientes.store');

  Route::post('/clientes', [clienteController::class,"edit"])->name('clientes.edit');

  Route::get('/clientes/{id}/edit',[clienteController::class,"edit"])->name('clientes.edit');

  Route::put('/clientes/{id}',[clienteController::class,"update"])->name('clientes.update');

  Route::delete('/clientes/{id}',[clienteController::class,"destroy"])->name('clientes.destroy');

  });


//usuarios
 Route::middleware('roles:administrador')->group(function () {
  Route::get('/{cliente_id}/usuarios/create', [UsuarioController::class,"create"])->name('usuarios.create');
  Route::post('/{cliente_id}/usuarios',[UsuarioController::class,"store"])->name('usuarios.store');
  Route::get('/{cliente_id}/usuarios', [UsuarioController::class,"index"])->name('usuarios.index');

  Route::get('/{cliente_id}/usuarios/{usuario_id}/edit', [UsuarioController::class,"edit"])->name('usuarios.edit');
  Route::put('/{cliente_id}/usuarios/{usuario_id}', [UsuarioController::class,"update"])->name('usuarios.update');
  Route::delete('/{cliente_id}/usuarios/{usuario_id}', [UsuarioController::class,"destroy"])->name('usuarios.destroy');

   });


//provedores
Route::middleware('roles:administrador,moderador')->group(function () {

 Route::resource('provedores',provedorController::class);
 
 });


//suministros
Route::middleware('roles:administrador,moderador')->group(function () {
 Route::get('/{provedor_id}/suministros/create', [SuministroController::class,"create"])->name('suministros.create');
 Route::post('/{provedor_id}/suministros',[SuministroController::class,"store"])->name('suministros.store');
 Route::get('/{provedor_id}/suministros', [SuministroController::class,"index"])->name('suministros.index');

 Route::get('/{provedor_id}/suministros/{suministro_id}/edit', [SuministroController::class,"edit"])->name('suministros.edit');
 Route::put('/{provedor_id}/suministros/{suministro_id}', [SuministroController::class,"update"])->name('suministros.update');
 Route::delete('/{provedor_id}/suministros/{suministro_id}', [SuministroController::class,"destroy"])->name('suministros.destroy');
});


//ventas

Route::middleware('roles:administrador,moderador')->group(function () {
 Route::get('/{cliente_id}/ventas/create', [VentaController::class,"create"])->name('ventas.create');
 Route::post('/{cliente_id}/ventas',[VentaController::class,"store"])->name('ventas.store');
 Route::get('/{cliente_id}/ventas', [VentaController::class,"index"])->name('ventas.index');

 Route::get('/{cliente_id}/ventas/{venta_cod}/edit', [VentaController::class,"edit"])->name('ventas.edit');
 Route::put('/{cliente_id}/ventas/{venta_cod}', [VentaController::class,"update"])->name('ventas.update');
 Route::delete('/{cliente_id}/ventas/{venta_cod}', [VentaController::class,"destroy"])->name('ventas.destroy');
});


//detalles venta
Route::middleware('roles:administrador,moderador')->group(function () {
 Route::get('/{cliente_id}/{venta_cod}/detalles_venta/create', [DetalleVentaController::class,"create"])->name('detalles_venta.create');
 Route::post('/{cliente_id}/{venta_cod}/detalles_venta',[DetalleVentaController::class,"store"])->name('detalles_venta.store');
 Route::get('/{cliente_id}/{venta_cod}/detalles_venta', [DetalleVentaController::class,"index"])->name('detalles_venta.index');

 Route::get('/{cliente_id}/{venta_cod}/detalles_venta/{detalles_venta_id}/edit', [DetalleVentaController::class,"edit"])->name('detalles_venta.edit');
 Route::put('/{cliente_id}/{venta_cod}/detalles_venta/{detalles_venta_id}', [DetalleVentaController::class,"update"])->name('detalles_venta.update');
 Route::delete('/{cliente_id}/{venta_cod}/detalles_venta/{detalles_venta_id}', [DetalleVentaController::class,"destroy"])->name('detalles_venta.destroy');

});

//envios:
Route::middleware('roles:administrador,moderador')->group(function () {
 Route::get('/{cliente_id}/{venta_cod}/envios/create', [EnvioController::class,"create"])->name('envios.create');
 Route::post('/{cliente_id}/{venta_cod}/envios',[EnvioController::class,"store"])->name('envios.store');
 Route::get('/{cliente_id}/{venta_cod}/envios', [EnvioController::class,"index"])->name('envios.index');

 Route::get('/{cliente_id}/{venta_cod}/envios/{cod_envio}/edit', [EnvioController::class,"edit"])->name('envios.edit');
 Route::put('/{cliente_id}/{venta_cod}/envios/{cod_envio}', [EnvioController::class,"update"])->name('envios.update');
 Route::delete('/{cliente_id}/{venta_cod}/envios/{cod_envio}', [EnvioController::class,"destroy"])->name('envios.destroy');

});


#categorias:

Route::middleware('roles:administrador')->group(function () {
 Route::get('/categorias', [CategoriaController::class,"index"])->name('categorias.index');

 Route::post('/categorias', [CategoriaController::class,"edit"])->name('categorias.edit');

 Route::get('/categorias/create',[CategoriaController::class,"create"])->name('categorias.create');

 Route::post('/categorias',[CategoriaController::class,"store"])->name('categorias.store');

 Route::get('/categorias/{id}/edit',[CategoriaController::class,"edit"])->name('categorias.edit');

 Route::put('/categorias/{id}',[CategoriaController::class,"update"])->name('categorias.update');

 Route::delete('/categorias/{id}',[CategoriaController::class,"destroy"]);
});

//producto
Route::middleware('roles:administrador,moderador')->group(function () {
 Route::resource('productos',ProductoController::class);

});
//Imagenes producto

 Route::get('/{id_producto}/imagenes_producto/create', [ImagenProductoController::class,"create"])->name('imagenes_producto.create');
 Route::post('/{id_producto}/imagenes_producto',[ImagenProductoController::class,"store"])->name('imagenes_producto.store');
 Route::get('/{id_producto}/imagenes_producto', [ImagenProductoController::class,"index"])->name('imagenes_producto.index');

 Route::get('/{id_producto}/imagenes_producto/{id_imagen_producto}/edit', [ImagenProductoController::class,"edit"])->name('imagenes_producto.edit');
 Route::put('/{id_producto}/imagenes_producto/{id_imagen_producto}', [ImagenProductoController::class,"update"])->name('imagenes_producto.update');
 Route::delete('/{id_producto}/imagenes_producto/{id_imagen_producto}', [ImagenProductoController::class,"destroy"])->name('imagenes_producto.destroy');
 


});



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
