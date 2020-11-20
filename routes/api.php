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
