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
    include '../geral/menu.php';?>


    <?php
        require '../BD/ConectaDB.php';
        $conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

        // Verifica conexão 
        if ($conn->connect_error) {
            die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
        }
        $sql = "SELECT * FROM quarto INNER JOIN tipo_quarto WHERE quarto.fk_tipo_quarto=tipo_quarto.idtipo_quarto";
        $result = $conn->query($sql);
        if ($result->num_rows >0) {
            while ($row = $result->fetch_assoc()) {
            
                echo $row['nome'];
            }

        }else{
            echo  $conn-> error;
        }
            
    ?>
    <?php include '../geral/rodape.html'?>
</body>
</html>