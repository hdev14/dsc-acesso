<!-- PÁGINA INICIAL, MOSTRA OS USUÁRIOS. -->

@foreach($usuarios as $usuario)
	{{ $usuario->nome }}
@endforeach