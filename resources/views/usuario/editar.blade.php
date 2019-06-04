<!-- PÁGINA PARA EDITAR O USUÁRIO. -->
@extends('templates.principal')

@section('conteudo')
	@component('componentes.form')
		@slot('action') UsuarioController@editar @endslot
		@slot('id')
			<input type="hidden" name="usuarios[id]" value="{{ $usuario->id }}">
		@endslot
	@endcomponent
@endsection
