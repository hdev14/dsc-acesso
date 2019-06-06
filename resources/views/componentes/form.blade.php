
<!-- FAZER UM COMPONENTE PARA O FORM PASSANDO UM PARAMETRO PARA ACTION-->
<!-- ESSE FORM SERÁ USADO NAS VISÕES DE CADASTRO E EDITAR USUÁRIO -->

<form method="post" action="{{ action($action) }}">
	@csrf
	
	{{ $id ?? '' }}

	<div class="form-group">
	    <label for="login">Login</label>
	    <input type="text" class="form-control" id="login" placeholder="{{ $login ?? 'Digite um apelido para o seu login' }}" name="usuarios[login]">
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
	    <input type="text" class="form-control" id="nome" placeholder="{{ $nome ?? 'Digite seu nome e sobrenome.' }}" name="usuarios[nome]">
	</div>
	<div class="form-group">
	    <label for="cpf">CPF</label>
	    <input type="text" class="form-control" id="cpf" placeholder="{{ $cpf ?? 'Apenas números' }}" name="usuarios[cpf]">
	</div>
	<div class="form-group">
	    <label for="tipo-acesso">Tipo de Acesso</label>
	    <select class="form-control" id="tipo-acesso" name="usuarios[tipo_acesso]">
	      	<option value="000">000</option>
	      	<option value="001">001</option>
	      	<option value="010">010</option>
		</select>
	</div>
	<div class="form-group form-check">
		<!-- Criar lógica com javascript para mudar o valor para false, caso seja desmarcado a opção. -->
	  	<input class="form-check-input" type="checkbox" name="usuarios[ativo]" value="{{ $ativo ?? '' }}" id="ativo">
	  	<label class="form-check-label" for="ativo">Ativo</label>
	</div>
	<button type="submit" class="btn btn-primary">Confirmar</button>
</form>
