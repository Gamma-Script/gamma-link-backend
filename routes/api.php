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


Route::get('productos','ProductoController@index');
Route::post('productos','ProductoController@store');
Route::put('productos/{id}','ProductoController@update');
Route::delete('productos/{id}','ProductoController@destroy');
Route::get('productos','ProductoController@productosFiltrados');




Route::get('puntuaciones','PuntuacionController@index');
Route::post('puntuaciones','PuntuacionController@store');
