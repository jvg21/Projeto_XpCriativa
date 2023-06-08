<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <link rel="stylesheet" href="estilo/form.css">
    
    <script src="JS/formScript.js" defer></script>
    <title>Hotelzin - Cadastro</title>
</head>
<body>
    <?php include '../geral/menu.php';
    include '../BD/ConectaDB.php';
    $conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);
    // **Verifica conexão 
    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

    $sql = "SELECT * FROM ".$DATABASE.".usuario";
    $result = $conn->query($sql);
    if ($result->num_rows >0) {
        while ($row = $result->fetch_assoc()) {
            echo "Seu nome é:". $row['nome']." ";
            echo "Nasceu:". $row['data_nasc'];
            echo "Time do coração é ".$row["Time"];
            echo '<br>';

        }
    }

    
    ////fazer o select
    
    
    
    
    
    
    
    
    
    ?>

</body>
<html>