<?php

use Illuminate\Http\Request;

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

Route::put('/logs/criar/', 'LogController@criar');

Route::post('/usuarios/autenticar/', 'UsuarioController@autenticar');

Route::get('/usuarios/get/{id}/', 'UsuarioController@getId');

Route::get('/usuarios/verificar/{token?}/', 'UsuarioController@verificar');
