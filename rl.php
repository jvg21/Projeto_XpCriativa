<?php
require './BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

$nome = array();
$preco = array();
$descricao = array();
$i = 1;
$sql = "SELECT * FROM hotelzin.tipo_quarto ORDER BY RAND() LIMIT 3;";
$result = $conn->query($sql);
if ($result->num_rows >0) {
    while ($row = $result->fetch_assoc()) {
      array_push($nome,$row['nome']);
      array_push($preco,$row['preco']);
      array_push($descricao,$row['descricao']);
    }
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css"> 

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
  <div class="container my-5">
    <h1>Lista de Quartos</h1>
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img src="imagens/quarto1.jpg" class="card-img-top" alt="Quarto 1" width="40" height="200">
          <div class="card-body">
            <h5 class="card-title"><?= $nome[0]?></h5>
            <p class="card-text"><?= $descricao[0]?></p>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted">R$<?= $preco[0]?> por noite</small>
              <button type="button"  class="btn btn-sm btn-outline-secondary"><a href="CadReserva.php">Reservar</a></button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img src="imagens/quarto 2.jpg" class="card-img-top" alt="Quarto 2" width="40" height="200">
          <div class="card-body">
            <h5 class="card-title"><?= $nome[1]?></h5>
            <p class="card-text"><?= $descricao[1]?></p>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted">R$<?= $preco[1]?> por noite</small>
              <button type="button"  class="btn btn-sm btn-outline-secondary"><a href="CadReserva.php">Reservar</a></button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img src="imagens/quarto3.jpg" class="card-img-top" alt="Quarto 3" width="40" height="200">
          <div class="card-body">
            <h5 class="card-title"><?= $nome[2]?></h5>
            <p class="card-text"><?= $descricao[2]?></p>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted">R$<?= $preco[2]?> por noite</small>
              <button type="button"  class="btn btn-sm btn-outline-secondary"><a href="CadReserva.php">Reservar</a></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
