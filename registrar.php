﻿<html>
<head>
	<title>Registrar-se</title>
	<meta charset="UTF-8">
	<meta name="description" content="CRUD em PHP">
</head>

<body>
<a href="index.php">Início</a> <br>
<?php
include("conectar.php");

// Capturar os dados fornecidos pelo usuário e gravá-los em variáveis:
if(isset($_POST['submit'])) {
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	// Verificar se nome de usuário já existe no banco:
	$sql = "SELECT usuario FROM login WHERE usuario = '$usuario'";
	$res = mysqli_query($strcon, $sql) or die("Não é possível verificar se usuário existe.");	
	$verificaUsuario = mysqli_fetch_assoc($res);
	if ($verificaUsuario['usuario'] == $usuario) {
		echo "Usuário já cadastrado.<br>";
		echo "<a href='registrar.php'>Voltar</a>";
	}
	// Verificar se usuário preencheu os campos corretamente:
	else if($usuario == "" || $senha == "" || $nome == "" || $email == "") {
		echo "Todos os campos devem ser preenchidos. Um ou mais campos estão vazios.<br>";
		echo "<a href='registrar.php'>Voltar</a>";
	}
	else {
		// Criando hash da senha fornecida no formulário:
		$hashSenha = password_hash($senha, PASSWORD_DEFAULT);
		
		// Conectar ao BD e inserir dados de cadastro:
		$sql = "INSERT INTO login(nome, email, usuario, senha)
		VALUES('$nome', '$email', '$usuario', '$hashSenha')";
		mysqli_query($strcon, $sql) or die("Não é possível executar a operação solicitada.");
			
		echo "Cadastro efetuado com sucesso!<br>";
		echo "<a href='login.php'>Login</a>";
	}
}
else {
?>
	<p><h2>Efetuar Cadastro de novo Usuário</h2></p>
	<p><h3>Preencha os campos abaixo e clique em "Registrar":</h3></p>
	<form nome="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nome Completo</td>
				<td><input type="text" name="nome"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Nome de usuário</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Senha</td>
				<td><input type="password" name="senha"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Registrar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
