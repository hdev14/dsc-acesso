
<!-- Componente form usado tanto no formulário de cadastro, como também no de editar um usuário. -->
<div class="row">
	<div class="col-6 offset-3">
		@if ($errors->any())
			@component('componentes.alert')
				@slot('message_type') danger @endslot
				@slot('message') 
					@foreach ($errors->all() as $error)
						{{ $error }}
					@endforeach
				@endslot
			@endcomponent
		@endif
	</div>

	<div class="col-6 offset-3">
		<form method="post" action="{{ action($action) }}">
			@csrf
			
			{{ $id ?? '' }}

			<div class="form-group">
			    <label for="login">Login</label>
			    <input type="text" class="form-control" id="login" placeholder="{{ $login ?? 'Digite um apelido para o seu login' }}" name="usuarios[login]" value="{{ $login ?? '' }}">
			</div>
			<div class="form-group">
			    <label for="senha">Senha</label>
			    <input type="password" class="form-control" id="senha" placeholder="Senha" name="usuarios[senha]">
			</div>
			<div class="form-group">
			    <label for="confirma-senha">Confirma Senha</label>
			    <input type="password" class="form-control" id="confirma-senha" placeholder="Por favor, digite sua senha novamente." name="confirmSenha">
			</div>
			<div class="form-group">
			    <label for="nome">Nome</label>
			    <input type="text" class="form-control" id="nome" placeholder="{{ $nome ?? 'Digite seu nome e sobrenome.' }}" name="usuarios[nome]" value="{{ $nome ?? '' }}">
			</div>
			<div class="form-group">
			    <label for="cpf">CPF</label>
			    <input type="text" class="form-control" id="cpf" placeholder="{{ $cpf ?? 'Apenas números' }}" name="usuarios[cpf]" value="{{ $cpf ?? '' }}">
			</div>
			<div class="form-group">
			    <label for="tipo-acesso">Tipo de Acesso</label>
			    <select class="form-control" id="tipo-acesso" name="usuarios[tipo_acesso]">
			      	<option value="100">Compra</option>
			      	<option value="010">Venda</option>
			      	<option value="001">Produção</option>
			      	<option value="110">Compra & Venda</option>
			      	<option value="101">Compra & Produção</option>
			      	<option value="011">Produção & Venda</option>
			      	<option value="111">Acesso Total</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Confirmar</button>
		</form>
	</div>
</div>

