<?php

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

Route::get('/index', 'UsuarioController@index');
Route::view('/cadastro', 'usuario.cadastro');

Route::post('/usuarios/autenticar', 'UsuarioController@autenticar');
Route::post('/usuarios/criar', 'UsuarioController@criar');
Route::match(['get','post'], '/usuarios/editar/{id?}', 'UsuarioController@editar');
Route::get('/usuarios/ativo/{id}', 'UsuarioController@ativo')->name("usuarios.ativo");
Route::post('/usuarios/excluir', 'UsuarioController@excluir');

