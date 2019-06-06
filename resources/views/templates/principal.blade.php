<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>TEMPLATE PRINCIPAL DA APLICAÇÃO</title>
	 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-light bg-light">
  		<a class="navbar-brand" href="#">ToY</a>
	</nav>
	<br>
	<div class="container">
		<div class="row">
			<div class="col">
				@section('conteudo')
				@show
			</div>
		</div>
	</div>

	<script type="text/javascript">
		
		// Lógica para o campo "ativo" do formuário.
		var elt_ativo = document.querySelector('#ativo');
		
		var ativo = function () {
			if(this.hasAttribute('checked')) {
				this.removeAttribute('checked');
				this.setAttribute('value', 0);
			} else {
				this.setAttributeNode(checked);
				this.setAttribute('value', 1);
			}
		}

		if (elt_ativo) {
			var attr_value = elt_ativo.getAttribute('value');
			var checked = document.createAttribute('checked');

			if(attr_value === '1')
				elt_ativo.setAttributeNode(checked);
			else
				elt_ativo.setAttribute('value', 0);
			
			elt_ativo.onclick = ativo;
		}
		
	</script>
</body>
</html>