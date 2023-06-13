<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../estilo/crud.css"> -->
    
    <script src="http://localhost/xp/Projeto_XpCriativa/Adm/JS/crudAdm.js" defer></script>
    <title>Hotelzin - Reativar Quarto</title>
    
</head>
<body>
    <?php
        try{
            $id = $_GET['id'];
        }catch(Exception $e){
            include 'http://localhost/xp/Projeto_XpCriativa/geral/controle.php';
            redirect();
        }

        include '../../geral/menu.php';
        redirect_if_not_adm();
        require '../../BD/ConectaDB.php';
        $conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);
        if ($conn->connect_error) {
            die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
        }
        
        ?>
    
    <div class="container">
    <form method="POST" action="roomActivateEXE.php">
    <!-- <fieldset disabled> -->
            <legend>Desativar Quarto</legend>
            <?php 
                    // Verifica conexão 
                    $sql = "SELECT * FROM quarto INNER JOIN tipo_quarto ON  quarto.fk_tipo_quarto=tipo_quarto.idtipo_quarto 
                    WHERE quarto.idquarto = $id ORDER BY num_quarto";
                    $result = $conn->query($sql);

                    if ($result->num_rows ==1) {
                        while ($row = $result->fetch_assoc()) {
                            //$cod = $row['idquarto'];
                            echo '
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">ID Quarto: </label>
                                <input type="number" name="id-quarto" id="disabledTextInput" class="form-control" value='.$id.' placeholder="Disabled input" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Número Quarto: </label>
                                <input type="number" id="disabledTextInput" class="form-control" value='.$row['num_quarto'].' placeholder="Disabled input"readonly>
                            </div>
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Tipo: </label>
                                <select id="disabledSelect" class="form-select" readonly>
                                    <option value='.$row['idtipo_quarto'].'>Tipo do Quarto: '.$row['nome'].' Preço: '.$row['preco'].'</option>
                                </select>
                            </div>
                            <div class="mb-3">
                            
                            </div>';
                        }
                    }else{
                        header("Location: ../menuAdm.php");
                    }
                
                    $conn->close();
            ?>
            <!-- </fieldset> -->
            <!-- <a  class="btn btn-primary" href="../menuAdm.php">Voltar</a> -->
            <button type="button" onclick=voltarMenuAdm() class="btn btn-primary">Voltar</button>
            <button type="submit" class="btn btn-primary">Ativar</button>
        
        </form>

    </div>
    
    <?php include '../../geral/rodape.html';?>
</body>
</html>