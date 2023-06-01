<?php    
if(!isset($_POST['id-quarto'])||!isset($_POST['num-quarto'])||!isset('opcoes')){
    include 'http://localhost/xp/Projeto_XpCriativa/geral/controle.php';
    redirect();
}else{
    $id = $_POST['id-quarto'];
    $num = $_POST['num-quarto'];
    $id_tipo = $_POST['opcoes'];

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
    if($num == $item){
        echo '<script language="javascript" type="text/javascript">
            alert("Número de quarto já exite");
            window.location.href = "http://localhost/xp/Projeto_XpCriativa/Adm/menuAdm.php";
        </script>';
        $cont = FALSE;
        die();
    }
}
if ($cont == TRUE){
    try{
        $sql = "UPDATE quarto SET num_quarto = '$num',fk_tipo_quarto='$id_tipo' WHERE quarto.idquarto= $id ";
        $result = $conn->query($sql);
        ?>
        <script language="javascript" type="text/javascript">
            alert('Alterar Quarto Executado');
            window.location.href = 'http://localhost/xp/Projeto_XpCriativa/Adm/menuAdm.php';
        </script>
        <?php
        $conn->close();
    }
    catch(Exception $e){
        $conn->close();
        ?>
        
        <script language="javascript" type="text/javascript">
            alert('Alterar quarto falhou');
            window.location.href = 'http://localhost/xp/Projeto_XpCriativa/Adm/menuAdm.php';
        </script>
        <?php
    }


    
}


?>