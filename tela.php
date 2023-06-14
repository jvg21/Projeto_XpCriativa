<?php
require './BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);
$sql = "SELECT * FROM ".$DATABASE.".usuario";
$result = $conn->query($sql);
if ($result->num_rows >0) {
    while ($row = $result->fetch_assoc()) {
        echo "Seu nome é:". $row['nome']." ";
        echo "Nasceu:". $row['data_nasc'];
        echo '<br>';

    }
}
?>