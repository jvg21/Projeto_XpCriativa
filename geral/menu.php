<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="larica.css">
    <title>Menu</title>
    <link rel="stylesheet" href="http://localhost/xp/Projeto_XpCriativa/geral/Css/menuCss.css">

    <script>
        function redirect(){
            window.location.href = "http://localhost/xp/Projeto_XpCriativa/Login/Logout.php";
            alert("Sessão Expirada, Redirecionando");
        }

    </script>
</head>
<body>
    
    <nav>
        <ul>
        <div>
            <img id="imagem" src="http://localhost/xp/Projeto_XpCriativa/imagens/logo.png" alt="Imagem">
        </div>
        <ul>
            
        
            <?php
           
            include 'controle.php';
            
            if(isset($_SESSION['login'])){
                                
                $LOCALDB = "localhost:3306";
                $USER = "root";
                $PASS = "";
                $DATABASE = "hotelzin";
                
                $conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);
                $SQL = "SELECT * FROM $DATABASE.usuario WHERE email = '".$_SESSION['login']."'";
                $result = $conn->query($SQL);
                if ($result->num_rows >0) {
                    while ($row = $result->fetch_assoc()) {
                        $Foto = $row['foto'];
                        
                    }
                }
                $conn->close();
            }
            
                if(!isset($_SESSION ['login'])){ 
                    echo '<li><a href="http://localhost/xp/Projeto_XpCriativa/login.php" class="btn btn-outline-light">Login</a></li>';
                    echo '<li><a href="http://localhost/xp/Projeto_XpCriativa/CadUser.php" class="btn btn-outline-light">Cadastre-se</a></li.';
                }else{
                    echo'<li>
                            <div>';
                            if ($Foto == null) {
                                echo '<i class="fas fa-user usuario-logado"></i>';
                            } else {
                                echo '<i><img style="border-radius: 50%; width:6vh;" src="data:image;base64,'.base64_encode($Foto).'"></i>';
                            }
                            echo '
                                <span>Bem Vindo '.$_SESSION['nivel'].', '.$_SESSION["nome"].'</span>
                            </div>
                        </li>
                    <li class="dropdown">
                        <a class="menu-drop">☰</a>
                        <div class="dropdown-menu">';
                        if($_SESSION['nivel'] == 'ADM'){
                            echo'
                            <a href="http://localhost/xp/Projeto_XpCriativa/Adm/menuAdm.php">Menu Adm</a>';
                            
                        }     
                        echo'
                        <a href="http://localhost/xp/Projeto_XpCriativa/CadReserva.php">Fazer Reserva</a>
                        <a href="#">Minhas Reservas</a>
                        <a href="http://localhost/xp/Projeto_XpCriativa/AltUser.php">Meus Dados</a>
                        <a href="http://localhost/xp/Projeto_XpCriativa/AltSenha.php">Trocar Senha</a>
                        <a href="http://localhost/xp/Projeto_XpCriativa/login/logout.php">Logout</a>
                        </div>
                    </li>';
                }


                if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
                    echo'
                        <script language="javascript" type="text/javascript">
                            redirect();
                        </script>';
                    
                }
                $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
            ?>

            
            
        </ul>
    </nav>
    
</body>
</html>

