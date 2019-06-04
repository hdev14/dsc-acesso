<!-- PÁGINA PARA EDITAR O USUÁRIO. -->
@extends('templates.principal')

@section('conteudo')
	@component('componentes.form')
		@slot('action') UsuarioController@editar @endslot
	@endcomponent
@endsection
