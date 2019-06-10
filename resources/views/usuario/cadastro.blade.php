<!-- PÁGINA DE CADASTRO -->
@extends('templates.principal')

@section('title')
	Usuários Cadastro
@endsection

@section('conteudo')
	@component('componentes.form')
		@slot('action') UsuarioController@criar @endslot
	@endcomponent
@endsection
