<!-- PÁGINA INICIAL, MOSTRA OS USUÁRIOS. -->
@extends('templates.principal')

@section('conteudo')
	<table class="table">
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">CPF</th>
			<th scope="col">Tipo de Acesso</th>
			<th scope="col" colspan="2">Opções</th>
		</tr>
		@foreach($usuarios as $usuario)
		<tr scope="row" class="{{ $usuario->ativo == 1 ? '' : 'table-secondary'  }}">
			<td>{{ $usuario->nome }}</td>
			<td>{{ $usuario->cpf }}</td>
			<td>{{ $usuario->tipo_acesso }}</td>
			<td colspan="2">
				<a class="btn btn-primary btn-sm" role="button" href="">Editar</a>
				@if ($usuario->ativo == 1)
					<a class="btn btn-secondary btn-sm" role="button" href='{{ url("/usuarios/ativo/$usuario->id") }}'>Desativar</a>
				@else
					<a class="btn btn-success btn-sm" role="button" href='{{ url("/usuarios/ativo/$usuario->id") }}'>Ativar</a>
				@endif
			</td>
		</tr>
		@endforeach
	</table>
@endsection