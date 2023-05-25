<?php 
session_start();
require '../BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

// Verifica conexão 
if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
}

try{
    $Nome = $_POST["firstname"]." ".$_POST["lastname"];
    $Email = $_POST["email"];
    $Telefone = $_POST["telefone"];
    $Sexo = $_POST["Sexo"];
    $Data = $_POST["data_nasc"];
    $Senha = $_POST["password"];
}catch(Exception $e){
    include 'http://localhost/xp/Projeto_XpCriativa/geral/controle.php';
    redirect();
}


try{
    $sql= "UPDATE usuario 
           SET nome = '$Nome', email = '$Email', telefone = '$Telefone', senha = '$Senha' 
           WHERE email = $Email;";

    $result = $conn->query($sql);
    $_SESSION ['login']       = $Email;           // Ativa as variáveis de sessão
   // $_SESSION ['ID_Usuario']  = $row['idcliente'];
    $_SESSION ['nome']        = $Nome;
    $_SESSION ['Nivel']       = "Cliente";

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