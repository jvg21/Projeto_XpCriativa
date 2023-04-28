<!DOCTYPE html>
<html>
<head>
	<title>Seu título aqui</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="estilo/style.css">
    <link rel="stylesheet" href="estilo/form.css">
</head>
<body>
	<?php include './geral/menu.php'?>
	<div class="container-form">
		<div class="form-signup">
			<h2>Formulário de Login</h2>
			<form action="login/LoginVerifica.php" method="POST">
			<div class="form-group">
				<label for="username">Usuário:</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Digite seu Email">
			</div>
			<div class="form-group">
				<label for="password">Senha:</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button>
			</form>
		</div>
		
	</div>
	<?php include './geral/rodape.html'?>
</body>
</html>