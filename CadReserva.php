<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <link rel="stylesheet" href="estilo/form.css">
    <script src="JS/formScript.js" defer></script>
    <title>Hotelzin - Reserva</title>
</head>
<body>
    <?php include './geral/menu.php';
    redirect_if_not_login();
    
    ?>
    
    <div class="container">
        <form class="form-signup" action="reservaCrud/ReservaExe.php" method="POST" enctype="multipart/form-data">
            <h2>Reservar Quarto</h2>
            <div class="form-group mb-2">
                <select name="quarto" required  class="form-select">
                    <option value="">Quarto*</option>
                    <option value="1">Single</option>
                    <option value="2">Dual</option>
                    <option value="3">Medium</option>
                    <option value="4">Premium</option>
                </select>              
            </div>

            <div class="form-group mb-2">
                <label for="data_in">Data Check-In* </label>
                <input type="date" class="form-control" id="data_in" name="data_in" required autocomplete="off"
                pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" >
            </div>

            <div class="form-group mb-2">
                <label for="data_out">Data Check-Out* </label>
                <input type="date" class="form-control" id="data_out" name="data_out" required autocomplete="off"
                pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" >
            </div>

            <div class="form-group mb-2">
                <label for="hora_in">Hora Check-In* </label>
                <input type="time" class="form-control" id="hora_in" name="hora_in" required autocomplete="off"  >
            </div>

            <div class="form-group mb-2">
                <label for="hora_out">Hora Check-Out* </label>
                <input type="time" class="form-control" id="hora_out" name="hora_out" required autocomplete="off"  >
            </div>

            <input type="submit" class="btn btn-success btn-block" name="" value="Enviar" >
        </form>
    </div>
     
    <?php include './geral/rodape.html'?>
    
            
    
</body>
</html>