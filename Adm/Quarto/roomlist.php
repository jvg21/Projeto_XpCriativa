<table class="table">
    <thead>
        <tr>
            <th scope="col" colspan="6">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#meuModal">
                    <img src="../imagens/iconeMais.svg"> Inserir Novo Quarto
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
            $sql = "SELECT * FROM quarto INNER JOIN tipo_quarto ON  quarto.fk_tipo_quarto=tipo_quarto.idtipo_quarto";
            $result = $conn->query($sql);

            if ($result->num_rows >0) {
                while ($row = $result->fetch_assoc()) {
                    echo'<tr>
                        <th scope="row">'.$row['idquarto'].'</th>
                        <td>'.$row['num_quarto'].'</td>
                        <td>'.$row['nome'].'</td>
                        <td>R$ '.$row['preco'].'</td>
                        <td><button type="button"><img src="../imagens/iconeEdit.svg"></button></td>
                        <td><button type="button"><img src="../imagens/iconeLixo.svg"></button></td>
                    </tr>';
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