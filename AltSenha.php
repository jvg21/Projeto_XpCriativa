<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <link rel="stylesheet" href="estilo/form.css">
    <script src="JS/formScript.js" defer></script>
    <title>Hotelzin - Senha</title>
</head>
<body>
    <?php 
    include './geral/menu.php';
    redirect_if_not_login();
    require 'BD/ConectaDB.php';
    $conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);
    ?>
    
    <div class="container">
        <form class="form-signup" action="UserCrud/AlterSenha.php" method="POST">
            <h2>Alterar senha</h2>
            <div class="form-group mb-2">
                <input  type="password" class="form-control"  id="password" name="password" placeholder="Senha atual*"required maxlength="15" autocomplete="off" onchange="confirmaSenha()"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&*]).{6,15}" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 6 até 15 caracteres.">
            </div>
            
            <div class="form-group mb-2">
                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nova senha*" required maxlength="15"  autocomplete="off" onchange="confirmaSenha()"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&*]).{6,15}" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 6 até 15 caracteres.">
            </div>
            <input name="checkSenha" type="checkbox" onclick="MostrarSenha('password')"> 
            <label for="checkSenha">Mostrar Senha</label>
            <input type="submit" class="btn btn-success btn-block" name="" value="Alterar" >
        </form>
    </div>
     
    <?php include './geral/rodape.html'?>
    
            
    
</body>
</html>