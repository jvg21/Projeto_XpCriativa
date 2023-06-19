<?php
require '../BD/ConectaDB.php';
include '../geral/controle.php';

$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE); 
if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
}

try{
    $id = $_GET['id'];
    $sql = "UPDATE $DATABASE.reserva SET `data_checkin` = '2023-10-09' WHERE (`idreserva` = '25');";
    $result = $conn->query($sql);
    ?>
    <script language="javascript" type="text/javascript">
        alert('Reserva Cancelada');
        window.location.href = 'http://localhost/xp/Projeto_XpCriativa/reservaCrud/reservaList.php';
    </script>
    <?php
    $conn->close();
}
catch(Exception $e){
    $conn->close();
    ?>
    
    <script language="javascript" type="text/javascript">
        alert('Desativar quarto falhou');
        window.location.href = 'http://localhost/xp/Projeto_XpCriativa/reservaCrud/reservaList.php';
    </script>
    <?php
}