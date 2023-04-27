<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelzin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo/style.css">
   
</head>
<body>
    <?php include './geral/menu.php'?>

    <main>
        <div class="container">
            <h1 class="Titulo">Colecione bons momentos com a gente!</h1>
            <p><mark>Os melhores quartos com os melhores preços.</mark></p>
        </div>
    </main>
        
    <div class="container">
        <div class="card red">
          <img src="imagens/quarto1.jpg" h2>
          <h2>Quartos Padrões</h2>
          <p>A partir de R$ 324,00</p>
          <button class="button">Reserve aqui</button>
        </div>
        
        <div class="card white">
          <img src="imagens/quarto 2.jpg" h2>
          <h2>Quartos com 2 suítes</h2>
          <p>A partir de R$ 548,00</p>
          <button class="button">Reserve aqui</button>
        </div>
        
        <div class="card red">
          <img src="imagens/quarto3.jpg" h2>
          <h2>Quartos de luxo</h2>
          <p>A partir de R$ 926,00</p>
          <button class="button">Reserve aqui</button>
        </div>
      </div>
      

      <?php include './geral/rodape.html'?>
</body>
</html>