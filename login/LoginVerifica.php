<?php
include '../geral/controle.php';
include '../BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

// // Verifica conexão  se houve um erro na conexão com o banco de dados
if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
}

try{
    $Usuario = $_POST["username"];
    $Senha = $_POST["password"];

}catch(Exception $e){
    redirect();
}
//  realiza uma consulta no banco de dados para verificar se há um usuário com o nome de usuário e senha fornecidos
$sql = "SELECT * FROM $DATABASE.usuario WHERE email = '$Usuario' AND senha = MD5('$Senha')";

if ($result = $conn->query($sql)) {
    if ($result->num_rows == 1) {         // Deu match: login e senha combinaram
        $row = $result->fetch_assoc();
        
        $_SESSION ['login']       = $Usuario;          
        //$_SESSION ['ID_Usuario']  = $row['idcliente'];
        $_SESSION ['nome']        = $row['nome'];
        $sql = "SELECT * FROM adm WHERE fk_idusuario = ".$row['idusuario']." ";
        $resultAdm = $conn->query($sql);
        //verifica se o usuário é um administrador ou um cliente
        if($resultAdm->num_rows == 1){
            $_SESSION['nivel'] = "ADM";
        }else{
            $_SESSION ['nivel'] = "Cliente";
        }
        ?>
        <script language="javascript" type="text/javascript">
            // exibe um alerta para o usuário, informando que o login foi bem-sucedido
            // window.location.href = 'http://localhost/xp/Projeto_XpCriativa/index.php';
            alert("Logado com Sucesso");
            window.location.replace("http://localhost/xp/Projeto_XpCriativa/index.php");
        </script>
        <?php
        
    }else{
        //$_SESSION ['nao_autenticado'] = true;         // Ativa ERRO nas variáveis de sessão
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