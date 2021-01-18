<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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





Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::get('anuncios', 'AnuncioController@index');
Route::get('anuncios/{id}','AnuncioController@show');
Route::post('anuncios', 'AnuncioController@store');
Route::put('anuncios/{id}','AnuncioController@update');
Route::delete('anuncios/{id}','AnuncioController@destroy');
Route::put('anuncios/{id}/baja','AnuncioController@baja');
Route::put('anuncios/{id}/subida','AnuncioController@subida');
Route::put('anuncios-proveedor/{id}/subida','AnuncioController@subida');

Route::get('categorias','CategoriaController@index');
Route::get('categorias/{id}','CategoriaController@show');
Route::post('categorias','CategoriaController@store');
Route::put('categorias/{id}','CategoriaController@update');
Route::delete('categorias/{id}','CategoriaController@destroy');
Route::get('categorias-usuario','CategoriaController@indexUsuario');
Route::get('categorias/buscar/{cadena}','CategoriaController@buscarPorNombre');

Route::post('clientes','ClienteController@store');

Route::get('productos','ProductoController@index');
Route::get('productos/{id}','ProductoController@show');
Route::post('productos','ProductoController@store');
Route::put('productos/{id}','ProductoController@update');
Route::delete('productos/{id}','ProductoController@destroy');

Route::get('productos-filtrados','ProductoController@productosFiltrados');
Route::get('productos-usuario','ProductoController@indexUsuario');
Route::get('productos-buscar/{cadena}','ProductoController@buscarPorNombre');

Route::get('proveedores','ProveedorController@index');
Route::get('proveedores/{id}/anuncios','ProveedorController@anuncios');
Route::get('proveedores/{id}/puntuaciones','ProveedorController@puntuaciones');
Route::get('proveedores/{id}/categorias','ProveedorController@categorias');

Route::get('proveedores/buscar/{cadena}','ProveedorController@buscarPorNombre');
Route::get('proveedores/departamentos','ProveedorController@getDeptos');

Route::get('proveedores/buscar/puntuacion/{puntuacion}','ProveedorController@buscarPorPuntuacion');
Route::get('proveedores/buscar/ubicacion/{idDepto}','ProveedorController@buscarPorUbicacion');


Route::get('proveedores/puntuaciones','PuntuacionController@index');
Route::post('proveedores/puntuaciones','PuntuacionController@store');
Route::put('proveedores/puntuaciones/{id}','PuntuacionController@update');
Route::delete('proveedores/puntuaciones/{id}','PuntuacionController@destroy');

Route::get('proveedores/{id}','ProveedorController@show');

Route::get('user-cliente/{id}','UserController@cliente');
Route::get('user-proveedor/{id}','UserController@proveedor');
// Route::get('user/{id}','UserController@tipo');
Route::get('user/{correo}','UserController@getUsuarioPorCorreo');