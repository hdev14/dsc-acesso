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

Route::prefix('usuarios')->group(function () {
	Route::get('index', 'UsuarioController@index')->name('index');
	Route::view('cadastro', 'usuario.cadastro')->name('cadastro');
	Route::post('autenticar', 'UsuarioController@autenticar');
	Route::post('criar', 'UsuarioController@criar');
	Route::match(['post', 'get'],'editar/{id?}', 'UsuarioController@editar');
	Route::get('ativo/{id}', 'UsuarioController@ativo')->name("usuarios.ativo");
	Route::post('excluir', 'UsuarioController@excluir');
});
