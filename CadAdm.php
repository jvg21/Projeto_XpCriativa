<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo/style.css">
    <link rel="stylesheet" href="estilo/form.css">
    
    <script src="JS/formScript.js" defer></script>
    <title>Hotelzin - Cadastro</title>
</head>
<body>
    <?php 
    include './geral/controle.php';
    include './geral/menu.php';?>

    <div class="container">
        <form class="form-signup" action="form_action.php" method="GET">
            <h2>Registrar Administrador</h2>
            <div class="form-group mb-2">
                <input type="text" class="form-control"  name="usuario" placeholder="Nome de Usuário*" required
                pattern="[A-Za-záàâãéèêíóôõúç\s]{3,25}" title="Nome com 3 a 25 Letras" maxlength="25" autocomplete="off">
            </div>
            <div class="form-group mb-2">
                <input  type="password" class="form-control"  id="password" name="password" placeholder="Senha*"required maxlength="15" autocomplete="off" onchange="confirmaSenha()"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&*]).{8,15}" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 até 15 caracteres.">
                <input type="checkbox" onclick="MostrarSenha('password')"> Mostrar Senha
            </div>
            
            <div class="form-group mb-2">
                <input type="password" class="form-control"  name="confirm_password" placeholder="Confirmar Senha*" 
                required maxlength="15" onchange="confirmaSenha()">
            </div>
            <div class="form-group mb-2">
                <label>
                    <input type="checkbox" name="" required>
                    Eu aceito o <a href="#">Termos de uso</a> & <a href="">Termos de Privacidade</a>
                </label>
            </div>
            <input type="reset" class="btn btn-success btn-block" value="Apagar">
            <input type="submit" class="btn btn-success btn-block" name="" value="Enviar" >
        </form>
    </div>
     
    <?php include './geral/rodape.html'?>
    
            
    
</body>
</html>