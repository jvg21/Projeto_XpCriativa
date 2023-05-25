<div>
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inserirQuartoModal">
    Inserir Quarto
  </button> -->
    <div class="modal fade" id="inserirTipoQuartoModal" tabindex="-1" aria-labelledby="meuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="meuModalLabel">Formulário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">

          <form action="TipoQuarto/TroomInsertEXE.php" method="POST">
            <div class="mb-3">
              <label for="nomeT" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nomeT" name="nomeT" required>
            </div>

            <div class="mb-3">
              <label for="preco" class="form-label">Preco</label>
              <input type="number" class="form-control" id="preco" name="preco" required>
            </div>

            
            <label for="descricao" class="form-label">Descricao</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
            
          <?php
          
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
