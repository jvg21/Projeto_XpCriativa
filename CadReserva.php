<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelzin ° Reserva</title>
    <link rel="stylesheet" href="estilo/style.css">
    <link rel="stylesheet" href="estilo/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>

    <?php include './geral/menu.php'?>

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
    
    <?php include './geral/rodape.html'?>
</body>
</html>