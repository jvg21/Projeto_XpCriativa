<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <link rel="stylesheet" href="estilo/form.css">
    <script src="JS/formScript.js" defer></script>
    <title>Hotelzin - Cadastro</title>
</head>
<body onload="dataMax('data_nasc')">
    <?php include './geral/menu.php';
    
    //echo $_SESSION['login'];?>
    
    <div class="container">
        <form class="form-signup" action="UserCrud/AlterUser.php" method="POST">
            <h2>Alterar cadastro</h2>
            <div class="form-group mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control"  name="firstname" placeholder="Nome*" required 
                        pattern="[A-Za-záàâãéèêíóôõúç\s]{3,20}" title="Nome com 3 a 20 Letras" maxlength="20" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control"  name="lastname" placeholder="Sobrenome*" required maxlength="20"
                        pattern="[A-Za-záàâãéèêíóôõúç\s]{3,20}" title="Nome com 3 a 20 Letras" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <input type="email" class="form-control"  name="email" placeholder="Email" autocomplete="off">
            </div>
            <div class="form-group mb-2">
                <input type="tel" class="form-control"  name="telefone" placeholder="Telefone*" required autocomplete="off"
                onkeydown="return mascaraTelefone(event)" title="(xx) xxxxx-xxxx" pattern="\(\d{2}\)\s\d{4,5}-\d{4}$">
            </div>
            <div class="form-group mb-2">
                <input  type="password" class="form-control"  id="password" name="password" placeholder="Senha*"required maxlength="15" autocomplete="off" onchange="confirmaSenha()"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&*]).{6,15}" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 6 até 15 caracteres.">
                <input name="checkSenha" type="checkbox" onclick="MostrarSenha('password')"> 
                <label for="checkSenha">Mostrar Senha</label>
            </div>            
            <div class="form-group mb-2">
                <input type="password" class="form-control"  name="confirm_password" placeholder="Confirmar Senha*" required maxlength="15" onchange="confirmaSenha()">
            </div>
            <input type="submit" class="btn btn-success btn-block" name="" value="Alterar" >
        </form>
    </div>
     
    <?php include './geral/rodape.html'?>
    
            
    
</body>
</html>