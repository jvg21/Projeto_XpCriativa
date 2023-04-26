<?php
$Usuario = $_POST["username"];
$Senha = $_POST["password"];
$Senha = md5($Senha);
echo $Usuario .$Senha;
require '../BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

// Verifica conexão 
if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
}

$sql = "SELECT * FROM cliente WHERE email = '$Usuario' AND senha = '$Senha'";

if ($result = $conn->query($sql)) {
    if ($result->num_rows == 1) {         // Deu match: login e senha combinaram
        $row = $result->fetch_assoc();
        $_SESSION ['login']       = $Usuario;           // Ativa as variáveis de sessão
        $_SESSION ['ID_Usuario']  = $row['idcliente'];
        $_SESSION ['nome']        = $row['nome'];
        unset($_SESSION ['nao_autenticado']);
        // unset($_SESSION ['mensagem_header'] ); 
        // unset($_SESSION ['mensagem'] ); 
        echo 'sucesso';
        //header('location: ../index.php'); // Redireciona para a página de funcionalidades.
        //exit();
        
    }else{
        $_SESSION ['nao_autenticado'] = true;         // Ativa ERRO nas variáveis de sessão
        // $_SESSION ['mensagem_header'] = "Login";
        // $_SESSION ['mensagem']        = "ERRO: Login ou Senha inválidos.";
        echo 'not sucesso';
        ///header('location: ../index.php'); // Redireciona para página inicial
        //exit();
    }
}
else {
    echo "Erro ao acessar o BD: " . $conn ->error;
}




?>