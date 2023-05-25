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
    <?php 
    include './geral/menu.php';
    require 'BD/ConectaDB.php';
    $conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);
    $SQL = "SELECT * FROM $DATABASE.usuario WHERE email = '".$_SESSION['login']."'";
    // echo $SQL;
    $result = $conn->query($SQL);
    if ($result->num_rows >0) {
        while ($row = $result->fetch_assoc()) {
            $Nome = $row['nome'];
            $Email = $row['email'];
            $Telefone = $row['telefone'];
            $Senha = $row['senha'];
        }
    }
   
    ?>
    
    <div class="container">
        <form class="form-signup" action="UserCrud/AlterUser.php" method="POST">
            <h2>Alterar cadastro</h2>
            <div class="form-group mb-2">
            </div>
            <div class="form-group mb-2">
                <input value="<?= $Email;?>" type="email" class="form-control"  name="email" placeholder="Email" autocomplete="off">
            </div>
            <div class="form-group mb-2">
                <input value="<?= $Telefone;?>" type="tel" class="form-control"  name="telefone" placeholder="Telefone*" required autocomplete="off"
                onkeydown="return mascaraTelefone(event)" title="(xx) xxxxx-xxxx" pattern="\(\d{2}\)\s\d{4,5}-\d{4}$">
            </div>
            <input type="submit" class="btn btn-success btn-block" name="" value="Alterar" >
        </form>
    </div>
     
    <?php include './geral/rodape.html'?>
    
            
    
</body>
</html>