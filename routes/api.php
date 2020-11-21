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
Route::get('categorias','CategoriaController@index');
    Route::post('categorias','CategoriaController@store');
    Route::get('categorias/{id}','CategoriaController@show');
    Route::put('categorias/{id}','CategoriaController@update');
    Route::delete('categoria/{id}','CategoriaController@destroy');

    Route::post('clientes','ClienteController@store');
    

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('productos','ProductoController@index');
Route::post('productos','ProductoController@store');
Route::put('productos/{id}','ProductoController@update');
Route::delete('productos/{id}','ProductoController@destroy');
Route::get('productos','ProductoController@productosFiltrados');




Route::get('puntuaciones','PuntuacionController@index');
Route::post('puntuaciones','PuntuacionController@store');
Route::get('proveedores','ProveedorController@index');
Route::get('proveedores/{id}','ProveedorController@show');



Route::get('anuncios', 'AnuncioController@index')->name("anuncios_index");
Route::post('anuncios', 'AnuncioController@store')->name("anuncios_store");
Route::get('anuncios/{id}','AnuncioController@show')->name("anuncios_show");
Route::put('anuncios/{id}','AnuncioController@update')->name("anuncios_update");
Route::delete('anuncios/{id}','AnuncioController@destroy')->name("anuncios_destroy");