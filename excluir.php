<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//Incluir o arquivo de conexão ao banco de dados
include("conectar.php");

//Obter o id dos dados a partir da URL
$id = $_GET['id'];

//Excluir a linha da tabela
$result=mysqli_query($mysqli, "DELETE FROM produtos WHERE id=$id");

//Redirecionar para a página de visualização -> ver.php
header("Location:ver.php");
?>

