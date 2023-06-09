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
    <?php include './geral/menu.php';?>
    
    <div class="container">
                                  <!--pasta onde está o php  -->
        <form class="form-signup" action="UserCrud/InsertUser.php" method="POST" enctype="multipart/form-data">
            <h2>Registrar Hospede</h2>
            <div class="form-group mb-2">
            <div class="col-md-6">
                <p style="text-align:center"><label class="w3-btn w3-theme">Selecione uma Imagem</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                <input type="file" id="imagem" name="imagem" accept="imagem/*" onchange="validaImagem(this);">
            </div>
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
                <input type="cpf" class="form-control"  name="cpf" placeholder="CPF*" required autocomplete="off" 
                oninput="mascaraCpf(this)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite um CPF no formato: xxx.xxx.xxx-xx">
            </div>
            <div class="form-group mb-2">
                <input type="tel" class="form-control"  name="telefone" placeholder="Telefone*" required autocomplete="off"
                onkeydown="return mascaraTelefone(event)" title="(xx) xxxxx-xxxx" pattern="\(\d{2}\)\s\d{4,5}-\d{4}$">
            </div>
            <div class="form-group mb-2">
                <!-- <Label for="Sexo">Sexo*</Label> -->
                <select name="Sexo" required  class="form-select" aria-label="Default select example">
                    <option value="">Sexo*</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>

                </select>
               
            </div>
            <div class="form-group mb-2">
                <label for="data_nasc">Data de Nascimento* </label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc" required autocomplete="off" min="1920-01-01"
                pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" >
            </div>
            <!--   SENHAS  -->

            <div class="form-group mb-2">
                <input  type="password" class="form-control"  id="password" name="password" placeholder="Senha*"required maxlength="15" autocomplete="off" onchange="confirmaSenha()"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&*]).{6,15}" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 6 até 15 caracteres.">
                <input name="checkSenha" type="checkbox" onclick="MostrarSenha('password')"> 
                <label for="checkSenha">Mostrar Senha</label>
            </div>
            
            <div class="form-group mb-2">
                <input type="password" class="form-control"  name="confirm_password" placeholder="Confirmar Senha*" required maxlength="15" onchange="confirmaSenha()">
            </div>
            <div class="form-group mb-2">
                <label>
                    <input type="checkbox" name="termos" required title="Leia e Aceite os Termos de Uso">
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