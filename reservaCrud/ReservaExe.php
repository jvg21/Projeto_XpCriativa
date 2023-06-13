<?php 
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

    include '../geral/menu.php';
    require '../BD/ConectaDB.php';

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
    $SQL ="SELECT idquarto
            FROM $DATABASE.quarto
            WHERE fk_tipo_quarto = $Tipo_quarto AND idquarto NOT IN (SELECT fk_idquarto
            FROM $DATABASE.quarto q INNER JOIN $DATABASE.reserva r ON q.idquarto = r.fk_idquarto 
            WHERE r.data_checkin <= '$Data_in' AND r.data_checkout >= '$Data_out') LIMIT 1;";
    $result = $conn->query($SQL);
    if ($result->num_rows >0) {
        while ($row = $result->fetch_assoc()) {
            $Quarto_id = $row['idquarto'];   
        }
    }

    $sql= "INSERT INTO $DATABASE.reserva (fk_idquarto,fk_idusuario,data_checkin,data_checkout,hora_checkin,hora_checkout) 
    VALUES ('$Quarto_id','$User_id','$Data_in','$Data_out','$Hora_in','$Hora_out');";
    $result = $conn->query($sql);
                                    
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
        alert("Erro ao cadastrar sua reserva. Por favor tente novamente");
        window.location.href = 'http://localhost/xp/Projeto_XpCriativa/CadReserva.php';
    </script>
    <?php
}


?>