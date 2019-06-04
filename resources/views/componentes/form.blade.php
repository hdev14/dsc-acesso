
<!-- FAZER UM COMPONENTE PARA O FORM PASSANDO UM PARAMETRO PARA ACTION-->
<!-- ESSE FORM SERÁ USADO NAS VISÕES DE CADASTRO E EDITAR USUÁRIO -->
<div>
	<form method="post" action="{{ $action }}">
		<div class="form-group">
		    <label for="login">Login</label>
		    <input type="password" class="form-control" id="login" placeholder="Digite um apelido para o seu login">
		</div>
		<div class="form-group">
		    <label for="senha">Senha</label>
		    <input type="password" class="form-control" id="senha" placeholder="Senha">
		</div>
		<div class="form-group">
		    <label for="confirma-senha">Confirma Senha</label>
		    <input type="password" class="form-control" id="confirma-senha" placeholder="Por favor, digite sua senha novamente.">
		</div>
		<div class="form-group">
		    <label for="nome">Nome</label>
		    <input type="password" class="form-control" id="nome" placeholder="Digite seu nome e sobrenome.">
		</div>
		<div class="form-group">
		    <label for="cpf">CPF</label>
		    <input type="password" class="form-control" id="cpf" placeholder="Apenas números">
		</div>
		<div class="form-group">
		    <label for="tipo-acesso">Tipo de Acesso</label>
		    <select class="form-control" id="tipo-acesso">
		      	<option>000</option>
		      	<option>001</option>
		      	<option>010</option>
			</select>
		</div>
		<div class="form-check">
		  	<input class="form-check-input" type="checkbox" value="" id="ativo">
		  	<label class="form-check-label" for="ativo">Ativo</label>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
