<?php
if(isset($_POST['id-quarto'])){
    $id = $_POST['id-quarto'];
    $nome = $_POST['nomeT'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
}else{
    include 'http://localhost/xp/Projeto_XpCriativa/geral/controle.php';
    redirect();
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


try{
    $sql = "UPDATE tipo_quarto SET nome= '$nome', preco = '$preco', descricao = '$descricao' WHERE idtipo_quarto = $id ";
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



?>