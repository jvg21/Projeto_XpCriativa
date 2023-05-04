<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../estilo/style.css"> -->
   
    
    <!-- <link rel="stylesheet" href="../estilo/form.css"> -->
    <title>Hotelzin - Agendar Quarto</title>
    
</head>
<body>
    <?php
        include '../geral/controle.php'; 
        include '../geral/menu.php';?>
    
    <!-- AQUIIIIIII -->
    <div class="container">
        oi
    </div>
    <!-- FIM -->
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
                echo '<div class="container">
                <div class="card red">
                    <img src="imagens/quarto1.jpg" h2>
                    <h2>'.$row['nome'].'</h2>
                    <p>Preço R$ '.$row['preco'].'</p>
                    <p>'.$row['descricao'].'</p>
                    <form id="cod">
                        <input type = "hidden" name="idquarto" value = '.$row["id"].'>
                    </form>
                    <button class="button" onclick="gravar_reserva()">Reserve aqui</button>
                </div></div>';
            }

        }else{
            echo  $conn-> error;
        }
            
    ?>
    <?php include '../geral/rodape.html'?>
</body>
</html>