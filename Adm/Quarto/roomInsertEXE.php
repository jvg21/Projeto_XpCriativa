<?php
try{
    $num = $_POST['numero'];
    $id_tipo = $_POST['opcoes'];
}catch(Exception $e){
    include 'http://localhost/xp/Projeto_XpCriativa/geral/controle.php';
    redirect();
}

require '../../BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

// Verifica conexão 
if ($conn->connect_error) {
    echo '<script language="javascript" type="text/javascript">
        
        alert(Falha de conexão: '. $conn->connect_error.');
        window.location.replace("http://localhost/xp/Projeto_XpCriativa/index.php");
    </script>';
    die();
}
$sql = "SELECT num_quarto FROM quarto";
$result_quartos = $conn->query($sql);
$quartos = array();

if ($result_quartos->num_rows > 0) {
    while ($row = $result_quartos->fetch_assoc()) {
        array_push($quartos,$row['num_quarto']);
    }
}
$cont = TRUE;

foreach ($quartos as $item) {
    if($num == $item){
        echo '<script language="javascript" type="text/javascript">
            alert("Número de quarto já exite");
        </script>';
        $cont = FALSE;
        die();
    }
}
if ($cont == TRUE){
    $sql = "INSERT INTO quarto (num_quarto,fk_tipo_quarto) VALUES ('$num','$id_tipo')";
    try{
        $result = $conn->query($sql);
    }catch(Exception $e){
        ?>
        <script language="javascript" type="text/javascript">
            alert('')
        </script>
        <?php
    }


    $conn->close();
}


?>