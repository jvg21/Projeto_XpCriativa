<?php
if(!isset($_POST['id-quarto'])){
    include 'http://localhost/xp/Projeto_XpCriativa/geral/controle.php';
    redirect();
}else{
    $id = $_POST['id-quarto'];

}
// echo $id;
require '../../BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

// Verifica conexão 
if ($conn->connect_error) {
    echo '<script language="javascript" type="text/javascript">
        
        alert(Falha de conexão: '. $conn->connect_error.');
        window.location.replace("http://localhost/xp/Projeto_XpCriativa/Adm/menuAdm.php");
    </script>';
    die();
}

try{
    $sql = "UPDATE quarto SET ativado = 1 WHERE quarto.idquarto= '$id' ";
    $result = $conn->query($sql);
    ?>
    <script language="javascript" type="text/javascript">
        alert('Ativar Quarto Executado');
        window.location.href = 'http://localhost/xp/Projeto_XpCriativa/Adm/menuAdm.php';
    </script>
    <?php
    $conn->close();
}
catch(Exception $e){
    $conn->close();
    ?>
    
    <script language="javascript" type="text/javascript">
        alert('Desativar quarto falhou');
        window.location.href = 'http://localhost/xp/Projeto_XpCriativa/Adm/menuAdm.php';
    </script>
    <?php
}



?>