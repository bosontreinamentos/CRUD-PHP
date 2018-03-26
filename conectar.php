<?php
/*
// mysql_connect("database-host", "usernome", "password")
$conn = mysql_connect("localhost","root","root") 
			or die("Não é possível conectar ao Banco de Dados");

// mysql_select_db("database-nome", "connection-link-identifier")
@mysql_select_db("aula_crud",$conn);
*/

/**
 * A função mysql_connect está deprecada
 * usaremos em seu lugar a função mysqli_connect
 */

$Servidor = 'localhost';
$nomeBanco = 'aula_crud';
$Usuario = 'fabio';
$Senha = '123';

$mysqli = mysqli_connect($Servidor, $Usuario, $Senha, $nomeBanco); 
	
?>
