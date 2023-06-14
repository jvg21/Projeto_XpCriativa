<table class="table table-hover">
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
            <th scope="col"></th>
            <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
        //********************Listagem************************** */
            require '../BD/ConectaDB.php';
            $conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

            // Verifica conexão 
            if ($conn->connect_error) {
                die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
            }
            $sql = "SELECT * FROM tipo_quarto";//SELECT campos FROM nome_tabela
            $result = $conn->query($sql);

            if ($result->num_rows >0) {
                while ($row = $result->fetch_assoc()) {
                    $cod = $row['idtipo_quarto'];//
                    //****echo '$row['quartos']';
                    //    echo '$row['nomedocamponobd']';*/
                    echo'<tr>
                        <th scope="row">'.$row['idtipo_quarto'].'</th>
                        <td>'.$row['nome'].'</td>
                        <td>R$ '.$row['preco'].'</td>
                        <td>'.$row['descricao'].'</td>
                        <td></td>
                        <td><a href="./TipoQuarto/TroomUpdate.php?id='.$cod.'"><img src="../imagens/iconeEdit.svg"></a></td>
                        
                    </tr>';
                    // <td><a href="./Quarto/TroomDelete.php?id='.$cod.'"><img src="../imagens/iconeLixo.svg"></a></td>
                }
            }//***************************Somente se não houver registros************************************************//
            else{
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