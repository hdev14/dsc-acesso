<!-- PÁGINA PARA EDITAR O USUÁRIO. -->
@extends('templates.principal')

@section('conteudo')
	@component('componentes.form')
		@slot('action') UsuarioController@editar @endslot
		@slot('login') {{ $usuario->login }} @endslot
		@slot('nome') {{ $usuario->nome }} @endslot
		@slot('cpf') {{ $usuario->cpf }} @endslot
		@slot('ativo') {{ $usuario->ativo }} @endslot
		@slot('id')
			<!-- Adiconar um campo hidden com o id do usuário para o update. -->
			<input type="hidden" name="usuarios[id]" value="{{ $usuario->id }}">
		@endslot
	@endcomponent
@endsection
