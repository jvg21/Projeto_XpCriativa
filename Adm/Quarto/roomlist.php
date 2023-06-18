<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col" colspan="6">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#inserirQuartoModal">
                <img src="../imagens/iconeMais.svg">
                    Inserir Quarto
                </button>
            </th>

        </tr>
        <br/>
        <tr>
            <th></th>
            <th><button class="btn btn-primary" onclick="updateURL(1)">Ativados</button></th>
            <th></th>
            <th><button class="btn btn-primary" onclick="updateURL(0)">Desativados</button></th>
            <th></th>
            <th><button class="btn btn-primary" onclick="redirectCleanUrl()">Todos</button></th>
      

        </tr>
        <br/>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Número Quarto</th>

            <th scope="col">Tipo Quarto</th>
            <th scope="col">Preço</th>
            <th scope="col">Alterar</th>
            <th scope="col">Ativar/Desativar</th>
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
            
            if(isset($_GET['atv'])&&$_GET['atv']==0){
                $sql = "SELECT * FROM quarto INNER JOIN tipo_quarto ON                                            
                quarto.fk_tipo_quarto=tipo_quarto.idtipo_quarto WHERE ativado = 0 ORDER BY idquarto DESC";
            }elseif(isset($_GET['atv'])&&$_GET['atv']==1){
                $sql = "SELECT * FROM quarto INNER JOIN tipo_quarto ON                                            
                quarto.fk_tipo_quarto=tipo_quarto.idtipo_quarto WHERE ativado = 1 ORDER BY idquarto DESC";

            }else{
                $sql = "SELECT * FROM quarto INNER JOIN tipo_quarto ON                                            
                quarto.fk_tipo_quarto=tipo_quarto.idtipo_quarto ORDER BY ativado DESC,idquarto";
            }
            
            $result = $conn->query($sql);
            
            if ($result->num_rows >0) {
                while ($row = $result->fetch_assoc()) {
                    $cod = $row['idquarto'];
                        if ($row['ativado']==1){
                            echo'
                            <tr>
                                <th scope="row">'.$row['idquarto'].'</th>
                                <td>'.$row['num_quarto'].'</td>
                                
                                <td>'.$row['nome'].'</td>
                                <td>R$ '.$row['preco'].'</td>
                                <td class="icone"><a href="./Quarto/roomUpdate.php?id='.$cod.'"><img src="../imagens/iconeEdit.svg"></a></td>
                                <td class="icone"><a href="./Quarto/roomDelete.php?id='.$cod.'"><img src="../imagens/iconeLixo.svg"></a></td>';
                        }else{
                           echo' 
                           <tr class="table-secondary">
                            <th scope="row">'.$row['idquarto'].'</th>
                            <td>'.$row['num_quarto'].'</td>
                            <td>'.$row['nome'].'</td>
                            <td>R$ '.$row['preco'].'</td>
                            <td></td>
                            <td class="icone"><a href="./Quarto/roomActivate.php?id='.$cod.'"><img src="../imagens/recycle.svg"></a></td>';
                        }
                    echo' </tr>';

                    
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