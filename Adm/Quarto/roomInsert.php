<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exemplo de modal no Bootstrap</title>
  <!-- Inclua o CSS do Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js" defer></script>
  <script src="../JS/crudAdm.js" defer></script>
</head>
<body>

  <!-- Botão que abre o modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#meuModal">
    Abrir modal
  </button>

  <!-- Modal -->
    <!-- Modal com formulário -->
    <div class="modal fade" id="meuModal" tabindex="-1" aria-labelledby="meuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="meuModalLabel">Formulário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          
          <form action="roomInsertEXE.php" method="POST">
            <div class="mb-3">
              <label for="numero" class="form-label">Número</label>
              <input type="number" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="mb-3">
              <label for="opcoes" class="form-label">Opções</label>
              <select class="form-select" id="opcoes" name="opcoes" required>
                <option value="">Opção de Quarto</option>
                <?php
                    require '../../BD/ConectaDB.php';
                    $conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);
                  
                    // Verifica conexão 
                    if ($conn->connect_error) {
                        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
                    }
                  
                    $sql = "SELECT * FROM tipo_quarto";
                    $result = $conn->query($sql);
                  
                    
                    while ($row = $result->fetch_assoc()){
                      echo '<option value'.$row['idtipo_quarto'].'>Tipo do Quarto: '.$row['nome'].' Preço: '.$row['preco'].'</option>';
                    }     
                    $conn->close();
                ?>
                      
              </select>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Salvar mudanças</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</body>
</html>
