<?php 
session_start();
require '../BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

// Verifica conexão 
if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
}

try{
    $Tipo_quarto = $_POST["quarto"];
    $Data_in = $_POST["data_in"];
    $Data_out = $_POST["data_out"];
    $Hora_in = $_POST["hora_in"];
    $Hora_out = $_POST["hora_out"];
}catch(Exception $e){
    include 'http://localhost/xp/Projeto_XpCriativa/geral/controle.php';
    redirect();
}


try{

    include './geral/menu.php';
    require 'BD/ConectaDB.php';

    # Atribui o id do usuário da sessão a uma variável
    $conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);
    $SQL = "SELECT * FROM $DATABASE.usuario WHERE email = '".$_SESSION['login']."'";
    $result = $conn->query($SQL);
    if ($result->num_rows >0) {
        while ($row = $result->fetch_assoc()) {
            $User_id = $row['idusuario'];   
        }
    }

    # Procura um quarto disponível no tipo desejado e atribui seu id a uma variável
    $SQL ="";
    $result = $conn->query($SQL);
    if ($result->num_rows >0) {
        while ($row = $result->fetch_assoc()) {
            $Quarto_id = $row['idquarto'];   
        }
    }

    $sql= "INSERT INTO $DATABASE.reserva (fk_idquarto,fk_idusuario,data_checkin,data_checkout,hora_checkin,hora_checkout) 
    VALUES ('$Nome','$User_id','$Data_in','$Data_out','$Hora_in','$Hora_out');";
                           
    $result = $conn->query($sql);
    $_SESSION ['login'] = $Email;          

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