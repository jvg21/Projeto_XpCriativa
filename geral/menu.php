<header class='menu-pagina'>
    <link rel="stylesheet" href="estilo/estiloPagina.css">
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
    session_start();          // Ativa as variáveis de sessão
    // $_SESSION ['ID_Usuario'] =0;
    // $_SESSION ['nome'] =0;
    // $_SESSION ['Nivel'] = '----';
            // $horaLogin = now();

            // echo $horaLogin;
            if(isset($_SESSION['Pagina_Controlada'])){
                unset($_SESSION['Pagina_Controlada']);
                header("location: ./index.php");
            }
            if(!isset($_SESSION ['login'])){ 
                echo'<nav class="nav-menu"><ul>
                <li><a type="button"  href="./CadUser.php" class="btn btn-success btn-block">Cadastrar</a></li>
                <li><a type="button" href="./login.php" class="btn btn-success btn-block">Login</a></li>
                    
                </ul></nav>';

            }else{
                echo'<nav class="nav-menu"><ul>
                
                <li><a type="button" href="login/logout.php" class="btn btn-success btn-block">Logout</a></li>
                <li>Olá '.$_SESSION['nome'].': '.$_SESSION['Nivel'].'</li>
                </ul> </nav>';
            }
        
        ?>
    </div>
</header>