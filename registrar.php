<html>
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

	// Verificar se usuário preencheu os campos corretamente:
	if($usuario == "" || $senha == "" || $nome == "" || $email == "") {
		echo "Todos os campos devem ser preenchidos. Um ou mais campos estão vazios.<br>";
		echo "<a href='registrar.php'>Voltar</a>";
	} else {
		
		// Criando hash da senha fornecida no formulário:
		$hashSenha = password_hash($senha, PASSWORD_DEFAULT);
		
		// Conectar ao BD e inserir dados de cadastro:
		mysqli_query($strcon, "INSERT INTO login(nome, email, usuario, senha)
		VALUES('$nome', '$email', '$usuario', '$hashSenha')")
			or die("Não é possível executar a operação solicitada.");
			
		echo "Cadastro efetuado com sucesso!<br>";
		echo "<a href='login.php'>Login</a>";
	}
} else {
?>
	<p><h2>Efetuar Cadastro</h2></p>
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
