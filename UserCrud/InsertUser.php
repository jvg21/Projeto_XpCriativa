<?php 
$Nome = $_POST["firstname"]." ".$_POST["lastname"];
$Cpf = $_POST["cpf"];
$Email = $_POST["email"];
$Telefone = $_POST["telefone"];
$Sexo = $_POST["Sexo"];
$Data = $_POST["data_nasc"];
$Senha = md5($_POST["password"]);

//echo $Cpf.$Email.$Telefone.$Sexo.$Data.$Senha
require '../BD/ConectaDB.php';
$conn = new mysqli($LOCALDB, $USER, $PASS, $DATABASE);

// Verifica conexão 
if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
}
$sqlG = "INSERT INTO cliente (nome,cpf,email,telefone,data_nasc,sexo,senha) VALUES 
('$Nome','$Cpf','$Email','$Telefone','$Data','$Sexo','$Senha');";

$result = $conn->query($sqlG);

header('location: ../CadUser.php');




?>