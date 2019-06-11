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

Route::prefix('usuarios')->group(function () {
    
    Route::post('autenticar', 'UsuarioController@autenticar');

    Route::get('get/{id}', 'UsuarioController@getId');

    Route::get('verificar/{token?}/', 'UsuarioController@verificar');
 
});
