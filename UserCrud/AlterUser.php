<?php 
session_start();
require '../BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

// Verifica conexão 
if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
}

try{
    $Email = $_POST["email"];
    $Telefone = $_POST["telefone"];
}catch(Exception $e){
    include 'http://localhost/xp/Projeto_XpCriativa/geral/controle.php';
    redirect();
}


try{
    $Login = $_SESSION['login'];
    $sql= "UPDATE $DATABASE.usuario 
           SET email = '$Email', telefone = '$Telefone'
           WHERE email = '$Login';";

    $result = $conn->query($sql);
    $_SESSION ['login']       = $Email;           // Ativa as variáveis de sessão


    ?>
    <script language="javascript" type="text/javascript">
        alert("Usuário alterado com Sucesso");
        window.location.href = 'http://localhost/xp/Projeto_XpCriativa/';
    </script>
    <?php
    //header('location: ../index.php');
}
catch(Exception $e) {
    ?>
    <script language="javascript" type="text/javascript">
        alert("Erro ao alterar os dados");
        window.location.href = 'http://localhost/xp/Projeto_XpCriativa/CadUser.php';
    </script>
    <?php
}


?>