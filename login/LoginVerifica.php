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
$sql = "SELECT * FROM usuario WHERE email = '$Usuario' AND senha = MD5('$Senha')";
// echo $sql;
// die();
if ($result = $conn->query($sql)) {
    if ($result->num_rows == 1) {         // Deu match: login e senha combinaram
        $row = $result->fetch_assoc();
        
        $_SESSION ['login']       = $Usuario;          
        //$_SESSION ['ID_Usuario']  = $row['idcliente'];
        $_SESSION ['nome']        = $row['nome'];
        $sql = "SELECT * FROM adm WHERE fk_idusuario = ".$row['idusuario']." ";
        $resultAdm = $conn->query($sql);
        if($resultAdm->num_rows == 1){
            $_SESSION['nivel'] = "ADM";
        }else{
            $_SESSION ['nivel'] = "Cliente";
        }
        ?>
        <script language="javascript" type="text/javascript">
            // window.location.href = 'http://localhost/xp/Projeto_XpCriativa/index.php';
            alert("Logado com Sucesso");
            window.location.replace("http://localhost/xp/Projeto_XpCriativa/index.php");
        </script>
        <?php
        
    }else{
        //$_SESSION ['nao_autenticado'] = true;         // Ativa ERRO nas variáveis de sessão
        ?>
        <script language="javascript" type="text/javascript">
            //window.location.href = 'http://localhost/xp/Projeto_XpCriativa/login.php';
            alert("Usuário ou Senha incorreto");
            
        </script>
        <?php
    }
}
else {
    echo "Erro ao acessar o BD: " . $conn ->error;
}




?>