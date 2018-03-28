﻿<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
</head>

<body>
<a href="index.php">Página Inicial</a> <br />
<?php
include("conectar.php");

if(isset($_POST['submit'])) {
	$usuario = mysqli_real_escape_string($strcon, $_POST['usuario']);
	$senha = mysqli_real_escape_string($strcon, $_POST['senha']);
	
	if($usuario == "" || $senha == "") {
		echo "Nome de usuário ou senha vazios.<br>";
		echo "<a href='login.php'>Voltar</a>";
	}
	else {
		$result = mysqli_query($strcon, "SELECT * FROM login WHERE usuario='$usuario'")
					or die("Ocorreu um problema ao executar a consulta solicitada.");
		
		$linha = mysqli_fetch_assoc($result);
		
		if (password_verify($senha, $linha['senha'])) {
		
			if(is_array($linha) && !empty($linha)) {
				$usuarioLogado = $linha['usuario'];
				$_SESSION['aberta'] = $usuarioLogado;
				$_SESSION['nome'] = $linha['nome'];
				$_SESSION['id'] = $linha['id'];
			}
		}
		else {
			echo "Nome de usuário ou senha inválido.<br>";
			echo "<a href='login.php'>Voltar</a>";
		}
		
		if(isset($_SESSION['aberta'])) {
			header('Location: index.php');			
		}
	}
}
else {
?>
	<p><font size="+2">Login</font></p>
	<form nome="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nome de Usuário</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Senha</td>
				<td><input type="password" name="senha"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Entrar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
