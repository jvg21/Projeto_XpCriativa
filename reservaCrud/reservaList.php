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
    include '../geral/menu.php';
    redirect_if_not_login();
    ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Numero Quarto</th>
                <th>Data Check In</th>
                <th>Data Check Out</th>
                <th>Horário Check IN</th>
                <th>Horário Check OUT</th>

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
        $sql = "SELECT * FROM hotelzin.reserva inner JOIN quarto ON reserva.fk_idquarto=quarto.idquarto INNER JOIN usuario ON usuario.idusuario=reserva.fk_idusuario WHERE usuario.email='".$_SESSION['login']."'";
        $result = $conn->query($sql);
        if ($result->num_rows >0) {
            while ($row = $result->fetch_assoc()) {
                
                echo'<tr>
                    <td>'.$row['num_quarto'].'</td>
                    <td>'.$row['data_checkin'].'</td>
                    <td>'.$row['data_checkout'].'</td>
                    <td>'.$row['hora_checkin'].'</td>
                    <td>'.$row['hora_checkout'].'</td>

                </tr>';
            }

        }else{
            echo'<tr>
                    <td>Nenhuma Reserva Efetuada</td>

                </tr>';
        }
            
    ?>
    </tbody>
    </table>
    <?php include '../geral/rodape.html'?>
</body>
</html>