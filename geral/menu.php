<header class='menu-pagina'>
    <link rel="stylesheet" href="estilo/estiloPagina.css">

    <?php session_start();
       //s$_SESSION ['login'];
    //    $_SESSION['Usuario'] = 'João';
    //    $_SESSION['Nivel'] = 'Adm';
    ?>
    <img src="imagens/logo3.png">
    <div class="container-menu">
        <!-- <div class="logo">
            <h1><a href="#">Hotelzin</a></h1>
            <img src="imagens/hel.PNG">
        </div> --->
        <nav class="nav-menu">
            <ul>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Serviços</a></li>
                <li><a href="#">Contato</a></li>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
       
    </div>
    <div class="menu-user">
    <?php
            if(!isset($_SESSION ['login'])){ 
                echo'<nav class="nav-menu"><ul>
                <li><a type="button"  href="./CadUser.php" class="btn btn-success btn-block">Cadastrar</a></li>
                <li><a type="button" href="./login.php" class="btn btn-success btn-block">Login</a></li>
                    
                </ul></nav>';

            }else{
                echo'<nav class="nav-menu">'.$_SESSION['Nivel'].': '.$_SESSION['Usuario'].' </nav>';
            }
        
        ?>
    </div>
</header>