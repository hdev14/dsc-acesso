<!-- PÁGINA INICIAL, MOSTRA OS USUÁRIOS. -->
@extends('templates.principal')

@section('conteudo')
	<table class="table">
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">CPF</th>
			<th scope="col">Tipo de Acesso</th>
			<th scope="col">Ativo</th>
			<th scope="col" colspan="2">Opções</th>
		</tr>
		@foreach($usuarios as $usuario)
		<tr scope="row" class="{{ $usuario->ativo == 1 ? '' : 'table-secondary'  }}">
			<td>{{ $usuario->nome }}</td>
			<td>{{ $usuario->cpf }}</td>
			<td>{{ $usuario->tipo_acesso }}</td>
			<td colspan="2">
				<a class="btn btn-primary btn-sm" role="button" href="">Editar</a>
				<a class="btn btn-danger btn-sm" role="button" href="">Excluir</a>
			</td>
		</tr>
		@endforeach
	</table>
@endsection