<?php 
session_start();
require '../BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

// Verifica conexão 
if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
}

$Nome = $_POST["firstname"]." ".$_POST["lastname"];
$Cpf = $_POST["cpf"];
$Email = $_POST["email"];
$Telefone = $_POST["telefone"];
$Sexo = $_POST["Sexo"];
$Data = $_POST["data_nasc"];
$Senha = $_POST["password"];

$sqlG= "INSERT INTO cliente (nome,cpf,email,telefone,data_nasc,sexo,senha) VALUES 
('$Nome','$Cpf','$Email','$Telefone','$Data','$Sexo','$Senha');";

$result = $conn->query($sql);
$_SESSION ['login']       = $Email;           // Ativa as variáveis de sessão
$_SESSION ['ID_Usuario']  = $row['idcliente'];
$_SESSION ['nome']        = $Nome;
$_SESSION ['Nivel']       = "CLIENTE";

header('location: ../index.php');

?>