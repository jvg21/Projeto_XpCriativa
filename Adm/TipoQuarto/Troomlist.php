<table class="table">
    <thead>
        <tr>
            <th scope="col" colspan="6">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inserirTipoQuartoModal">
                <img src="../imagens/iconeMais.svg">
                    Inserir Tipo de Quarto
                </button>
            </th>

        </tr>
        <br/>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Tipo Quarto</th>
            <th scope="col">Preço</th>
            <th scope="col">Descrição</th>
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
            $sql = "SELECT * FROM tipo_quarto";
            $result = $conn->query($sql);

            if ($result->num_rows >0) {
                while ($row = $result->fetch_assoc()) {
                    $cod = $row['idtipo_quarto'];
                    echo'<tr>
                        <th scope="row">'.$row['idtipo_quarto'].'</th>
                        <td>'.$row['nome'].'</td>
                        <td>R$ '.$row['preco'].'</td>
                        <td>'.$row['descricao'].'</td>
                        <td><a href="./TipoQuarto/TroomUpdate.php?id='.$cod.'"><img src="../imagens/iconeEdit.svg"></a></td>
                        
                    </tr>';
                    // <td><a href="./Quarto/TroomDelete.php?id='.$cod.'"><img src="../imagens/iconeLixo.svg"></a></td>
                }
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