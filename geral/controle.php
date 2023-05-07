<?php
function redirect_if_not_login(){
    if(!isset($_SESSION['login'])){
		header('Location: http://localhost/xp/Projeto_XpCriativa/');
	}
    return 0;
}
function redirect_if_login(){
    
    if(isset($_SESSION['login'])){
		header('Location: http://localhost/xp/Projeto_XpCriativa/');
	}
    return 0;
}
function redirect(){
    header('Location: http://localhost/xp/Projeto_XpCriativa/');
}
?>