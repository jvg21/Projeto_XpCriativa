<?php
try{
    $nome = $_POST['nomeT'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    //echo "$nome,$preco,$descricao";

}catch(Exception $e){
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
$sql = "INSERT INTO tipo_quarto (nome,preco,descricao) VALUES ('$nome','$preco','$descricao');";

try{
    $result = $conn->query($sql);
    //$conn->close();
    die();
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
        alert('Cadastro do Tipo quarto falhou');
        window.location.href = 'http://localhost/xp/Projeto_XpCriativa/Adm/menuAdm.php';
    </script>
    <?php
}




?>