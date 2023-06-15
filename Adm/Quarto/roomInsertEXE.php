<?php

if(!isset($_POST['numero']) || !isset($_POST['opcoes'])){
    include 'http://localhost/xp/Projeto_XpCriativa/geral/controle.php';
    redirect();
    exit();
}else{
    $numero = $_POST['numero'];
    $id_tipo = $_POST['opcoes'];
    $tamanho = $_POST['tamanho'];
}
// echo $num.$id_tipo;
require '../../BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

// Verifica conexão 
if ($conn->connect_error) {
    echo '<script language="javascript" type="text/javascript">
        
        alert(Falha de conexão: '. $conn->connect_error.');
        window.location.replace("http://localhost/xp/Projeto_XpCriativa/ADM/menuAdm.php");
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
    if($numero == $item){
        echo '<script language="javascript" type="text/javascript">
            alert("Número de quarto já exite");
            window.location.href = "http://localhost/xp/Projeto_XpCriativa/Adm/menuAdm.php";
        </script>';
        $cont = FALSE;
        die();
    }
}
if ($cont == TRUE){
    //echo 'oi';
    $sql = "INSERT INTO quarto (num_quarto,fk_tipo_quarto,tamanho) VALUES ('$numero','$id_tipo','$tamanho')";
    try{
        $result = $conn->query($sql);
        $conn->close();
        ?>
        <script language="javascript" type="text/javascript">
            alert('Cadastro de quarto feito com sucesso');
            window.location.href = 'http://localhost/xp/Projeto_XpCriativa/Adm/menuAdm.php';
        </script>
        <?php
    }catch(Exception $e){
        $conn->close();
        ?>
        <script language="javascript" type="text/javascript">
            alert('Cadastro de quarto falhou');
            window.location.href = 'http://localhost/xp/Projeto_XpCriativa/Adm/menuAdm.php';
        </script>
        <?php
    }


    
}


?>