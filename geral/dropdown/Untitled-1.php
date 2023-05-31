<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav>
        <ul>
            
            <?php
            session_start();
                if(!isset($_SESSION ['login'])){ 
                    echo '<li><a href="http://localhost/xp/Projeto_XpCriativa/login.php" class="btn btn-outline-secondary">Login</a></li>';
                    echo '<li><a href="http://localhost/xp/Projeto_XpCriativa/CadUser.php" class="btn btn-outline-secondary">Cadastre-se</a></li.';
                }else{
                    echo'<li>
                            <div>
                                <i class="fas fa-user usuario-logado"></i>
                                <span>Bem Vindo '.$_SESSION['nivel'].', '.$_SESSION["nome"].'</span>
                            </div>
                        </li>
                    <li class="dropdown">
                        <a href=""><img src="../../imagens/iconeList.svg" alt="Lista" height="30"></a>
                        <div class="dropdown-menu">';
                        if($_SESSION['nivel'] == 'ADM'){
                            echo'<a href="">Sobre</a>
                                <a href="">Contato</a>
                                <a href="">Configurações</a>';
                            
                        }else{
                            
                        }

                            
                        echo'
                        </div>
                    </li>';
                }
            ?>

            
            
        </ul>
    </nav>
    
</body>
</html>

