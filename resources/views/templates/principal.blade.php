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
</body>
</html>