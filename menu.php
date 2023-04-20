<header>
    <?php session_start();
       $_SESSION ['login'];
       $_SESSION['Usuario'] = 'João';
       $_SESSION['Nivel'] = 'Adm';
    ?>
    <img src="imagens/logo3.png">
    <div class="container">
        <!-- <div class="logo">
            <h1><a href="#">Hotelzin</a></h1>
            <img src="imagens/hel.PNG">
        </div> --->
        <nav>
            <ul>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Serviços</a></li>
                <li><a href="#">Contato</a></li>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
        <?php
            if(!isset($_SESSION ['login'])){ 
                echo'<nav><ul>
                <li><button type="button" class="btn btn-success btn-block">Cadastrar</button></li>
                    <li><button type="button" class="btn btn-success btn-block">Login</button></li>
                    
                </ul></nav>';

            }else{
                echo'<nav>'.$_SESSION['Nivel'].': '.$_SESSION['Usuario'].' </nav>';
            }
        
        ?>
    </div>
</header>