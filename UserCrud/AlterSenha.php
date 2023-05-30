<?php 
session_start();
require '../BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

// Verifica conexão 
if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
}

// Recebe a senha do banco e armazena em $Senha
$SQL = "SELECT * FROM $DATABASE.usuario WHERE email = '".$_SESSION['login']."'";
$result = $conn->query($SQL);
if ($result->num_rows >0) {
    while ($row = $result->fetch_assoc()) {
        $Senha = $row['senha'];
    }
}

// Recebe os inputs do formulário
try{
    $SenhaAtual = md5($_POST["password"]);
    $NovaSenha = md5($_POST["new_password"]);
}catch(Exception $e){
    include 'http://localhost/xp/Projeto_XpCriativa/geral/controle.php';
    redirect();
}

// Compara a senha atual inserida é igual a que está no banco
try{

    if ($SenhaAtual == $Senha) {
        $Login = $_SESSION['login'];
        $sql= "UPDATE $DATABASE.usuario 
               SET senha = '$NovaSenha'
               WHERE email = '$Login';";
    
        $result = $conn->query($sql);
        
        $_SESSION ['senha']       = $NovaSenha;

    }

    ?>
    <script language="javascript" type="text/javascript">
        alert("Senha alterada com Sucesso");
        window.location.href = 'http://localhost/xp/Projeto_XpCriativa/';
    </script>
    <?php
    //header('location: ../index.php');
}
catch(Exception $e) {
    ?>
    <script language="javascript" type="text/javascript">
        alert("Erro ao alterar a senha");
        window.location.href = 'http://localhost/xp/Projeto_XpCriativa/CadUser.php';
    </script>
    <?php
}


?>