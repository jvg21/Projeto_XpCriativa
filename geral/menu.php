<header class='menu-pagina'>
    
    <!-- PARTE INICIAL DE CIMA, OQUE ESTÁ EM VERMELHO -->
    <!-- <link rel="stylesheet" href="estilo/estiloPagina.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="http://localhost/xp/Projeto_XpCriativa/estilo/estiloPagina.css">
    <img src="http://localhost/xp/Projeto_XpCriativa/imagens/logo3.png">
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
                <li><a href="http://localhost/xp/Projeto_XpCriativa/">Home</a></li>
            </ul>
        </nav>
       
    </div>
    <div class="menu-user">
    <?php
    include 'controle.php';
            
            if(!isset($_SESSION ['login'])){ 
                // if(isset($_SESSION['Pagina_Controlada'])==true){
                //     unset($_SESSION['Pagina_Controlada']);
                //     header("location: ./index.php");
                // }
                echo'<nav class="nav-menu"><ul>
                <li><a type="button"  href="./CadUser.php" class="btn btn-success btn-block">Cadastrar</a></li>
                <li><a type="button" href="./login.php" class="btn btn-success btn-block">Login</a></li>
                </ul></nav>';

            }else{
                echo'<nav class="nav-menu"><ul>';
                if($_SESSION['nivel'] == "ADM"){
                    echo '<li><a type="button" href="http://localhost/xp/Projeto_XpCriativa/ADM/menuAdm.php" class="btn btn-success btn-block">MENU ADM</a></li>';

                }
                echo'
                <li><a type="button" href="http://localhost/xp/Projeto_XpCriativa/login/logout.php" class="btn btn-success btn-block">Logout</a></li>
                <li>Bem Vindo '.$_SESSION['nivel'].': '.$_SESSION['nome'].'</li>
                </ul> </nav>';
            }
        
        ?>
    </div>
</header>