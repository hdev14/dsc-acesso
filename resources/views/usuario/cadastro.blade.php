<!-- PÁGINA DE CADASTRO -->
@extends('templates.principal')

@section('conteudo')
	@component('componentes.form')
		@slot('action') UsuarioController@criar @endslot
	@endcomponent
@endsection
