<?php
session_start(); 
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
function redirect_if_not_adm(){
    if(isset($_SESSION['nivel'])){
        if($_SESSION['nivel'] == "ADM"){
            return 0;
        }
	}
    header('Location: http://localhost/xp/Projeto_XpCriativa/');
}
function redirect(){
    header('Location: http://localhost/xp/Projeto_XpCriativa/');
}
?>