<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo/style.css">
    <link rel="stylesheet" href="estilo/form.css">
    <script src="JS/formScript.js" defer></script>
    <title>Hotelzin - Agendar Quarto</title>
    
</head>
<body>

    <?php
    include './geral/controle.php';
    include './geral/menu.php';?>

    <div class="container">
        <form class="form-signup" action="">
            <h2 class="h2-form">Agende sua hospedagem!</h2><br>
            <input type="date" placeholder="Data de entrada" class="form-control input-reserva">
            <input type="time" placeholder="Hora entrada" class="form-control input-reserva">
            <select name="" id="" class="form-control select-reserva">
                <option value="" disabled selected>Selecione um Quarto</option>
                <option value="">Single</option>
                <option value="">Couple</option>
                <option value="">Premium</option>
            </select>
            <input type="date" placeholder="Data de saída" class="form-control input-reserva">
            <input type="time" placeholder="Hora saída" class="form-control input-reserva">
            <input type="submit" value="Agendar" class="btn btn-primary">
        </form>
    </div>
    <?php include './geral/rodape.html'?>
</body>
</html>