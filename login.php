<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<link rel="stylesheet" href="estilo/style.css">
    <link rel="stylesheet" href="estilo/form.css">
	<script src="JS/formScript.js" defer></script>
	<title>Hotelzin - Login</title>
</head>
<body>
	<?php 
	include './geral/menu.php';
	redirect_if_login();
	?>
	<div class="container">
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
			<input name="checkSenha" type="checkbox" onclick="MostrarSenha('password')"> 
            <label for="checkSenha">Mostrar Senha</label><br/>
			<button type="submit" class="btn btn-primary">Enviar</button>
			</form>
		</div>
		
	</div>
	<?php include './geral/rodape.html'?>
</body>
</html>