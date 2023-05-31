<table class="table">
    <thead>
        <tr>
            <th scope="col" colspan="6">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inserirQuartoModal">
                <img src="../imagens/iconeMais.svg">
                    Inserir Quarto
                </button>
            </th>

        </tr>
        <br/>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Número Quarto</th>
            <th scope="col">Tipo Quarto</th>
            <th scope="col">Preço</th>
            <th scope="col">Alterar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
            require '../BD/ConectaDB.php';
            $conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

            // Verifica conexão 
            if ($conn->connect_error) {
                die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
            }
            $SqlInativo = "SELECT * FROM quarto INNER JOIN tipo_quarto ON  
            quarto.fk_tipo_quarto=tipo_quarto.idtipo_quarto where quarto.ativado=0 	ORDER BY num_quarto";
            $resultI = $conn->query($SqlInativo);

            $sql = "SELECT * FROM quarto INNER JOIN tipo_quarto ON  
            quarto.fk_tipo_quarto=tipo_quarto.idtipo_quarto where quarto.ativado=1 	ORDER BY num_quarto";
            $result = $conn->query($sql);

            if ($result->num_rows >0) {
                while ($row = $result->fetch_assoc()) {
                    $cod = $row['idquarto'];
                    echo'<tr>
                        <th scope="row">'.$row['idquarto'].'</th>
                        <td>'.$row['num_quarto'].'</td>
                        <td>'.$row['nome'].'</td>
                        <td>R$ '.$row['preco'].'</td>
                        <td class="icone"><a href="./Quarto/roomUpdate.php?id='.$cod.'"><img src="../imagens/iconeEdit.svg"></a></td>
                        <td class="icone"><a href="./Quarto/roomDelete.php?id='.$cod.'"><img src="../imagens/iconeLixo.svg"></a></td>
                    </tr>';

                    
                }
                if ($resultI->num_rows >0) {
                    echo '<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Número Quarto</th>
                            <th scope="col">Tipo Quarto</th>
                            <th scope="col">Preço</th>
                            <th scope="col"></th>
                            <th scope="col">Reativar</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while ($rowI = $resultI->fetch_assoc()) {
                        echo'<tr>
                        <th scope="row">'.$rowI['idquarto'].'</th>
                        <td>'.$rowI['num_quarto'].'</td>
                        <td>'.$rowI['nome'].'</td>
                        <td>R$ '.$rowI['preco'].'</td>
                        <td></td>
                        <td class="icone"><a href="./Quarto/roomDelete.php?id='.$cod.'"><img src="../imagens/recycle.svg"></a></td>
                    </tr>';
                    // <td><a href="./Quarto/roomUpdate.php?id='.$cod.'"><img src="../imagens/iconeEdit.svg"></a></td>

                    }}
            }else{
                echo'<tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td>Nenhum registro encontrado</td>
                        <td></td>
                        <td></td>
                    </tr>';
            }
        ?>
    </tbody>
</table>