<?php 
session_start();
require '../BD/ConectaDB.php';//**ARQUIVO NESCESSÁRIO PARA CONEXÕES NO BD
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE); //**CRIA A CONEXÃO NO BD

// **Verifica conexão 
if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
}

if(isset($_POST["cpf"])){
    //tag dentro do $_Post é o name do html
    $Nome = $_POST["firstname"]." ".$_POST["lastname"];
    $Cpf = $_POST["cpf"];
    $Email = $_POST["email"];
    $Telefone = $_POST["telefone"];
    $Sexo = $_POST["Sexo"];
    $Data = $_POST["data_nasc"];
    $Senha = $_POST["password"];
}
else{
    include 'http://localhost/xp/Projeto_XpCriativa/geral/controle.php';
    redirect();
}

try{

    if ($_FILES['imagem']['size'] == 0) { 
        //**query banco de dados               //**nome dos campos no banco de dados                          
        $sql= "INSERT INTO $DATABASE.usuario (nome,cpf,email,telefone,data_nasc,sexo,senha,foto) VALUES 
        ('$Nome','$Cpf','$Email','$Telefone','$Data','$Sexo',md5('$Senha'),NULL);";

    } else {                             
        $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name'])); // Atribui a foto a uma variavel
        //***************************** */
        $sql= "INSERT INTO $DATABASE.usuario 
        (nome,cpf,email,telefone,data_nasc,sexo,senha,foto) VALUES 
        ('$Nome','$Cpf','$Email','$Telefone','$Data','$Sexo',md5('$Senha'),'$imagem');";
    }

    $result = $conn->query($sql); //**realiza a query no banco(cadastro)
    $_SESSION ['login']       = $Email;      
    $_SESSION ['nome']        = $Nome;
    $_SESSION ['nivel']       = "CLIENTE";

    ?>
    <script language="javascript" type="text/javascript">
        alert("Cadastrado com Sucesso");
        window.location.href = 'http://localhost/xp/Projeto_XpCriativa/';
    </script>
    <?php
}
catch(Exception $e) {
    echo $e;
    ?>
    <script language="javascript" type="text/javascript">
        alert("Erro ao cadastrar");
        window.location.href = 'http://localhost/xp/Projeto_XpCriativa/CadUser.php';
    </script>
    <?php
}


?>