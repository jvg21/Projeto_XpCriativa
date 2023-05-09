<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo/crud.css">
    
    <!-- <script src="../JS/crudAdm.js" defer></script> -->
    <title>Hotelzin - Agendar Quarto</title>
    
</head>
<body>
    <?php
        include '../geral/menu.php';
        redirect_if_not_adm();?>
    
    <div class="container">
        
        <div class="lista-quartos">
            <?php include 'Quarto/roomList.php';?>
        </div>
        <div class="modal-teste">
        <?php include 'Quarto/roomInsert.php';?>
        </div>
    </div>
    
    <?php include '../geral/rodape.html'?>
</body>
</html>