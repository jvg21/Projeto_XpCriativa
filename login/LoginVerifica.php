<?php
session_start();
require '../BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

// Verifica conexão 
if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
}

$Usuario = $_POST["username"];
$Senha = $_POST["password"];
$Senha = $Senha;
//echo $Senha;
$sql = "SELECT * FROM cliente WHERE email = '$Usuario' AND senha = MD5('$Senha')";
// echo $sql;
// die();
if ($result = $conn->query($sql)) {
    if ($result->num_rows == 1) {         // Deu match: login e senha combinaram
        $row = $result->fetch_assoc();
        
        $_SESSION ['login']       = $Usuario;           // Ativa as variáveis de sessão
        $_SESSION ['ID_Usuario']  = $row['idcliente'];
        $_SESSION ['nome']        = $row['nome'];
        $_SESSION ['Nivel']       = "CLIENTE";


        ?>
        <script language="javascript" type="text/javascript">
            alert("Logado com Sucesso");
            window.location.href = 'http://localhost/xp/Projeto_XpCriativa/';
        </script>
        <?php
        
    }else{
        $_SESSION ['nao_autenticado'] = true;         // Ativa ERRO nas variáveis de sessão
        ?>
        <script language="javascript" type="text/javascript">
            alert("Usuário ou Senha incorreto");
            window.location.href = 'http://localhost/xp/Projeto_XpCriativa/login.php';
        </script>
        <?php
    }
}
else {
    echo "Erro ao acessar o BD: " . $conn ->error;
}




?>