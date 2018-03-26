<?php session_start(); ?>
<html>
<head>
	<title>Página Inicial</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bem-vindo ao Sistema de Cadastro de Produtos
	</div>
	<?php
	if(isset($_SESSION['valid'])) {	// Verifica se usuário já está logado			
		include("conectar.php");					
		echo "Bem-vindo " . $_SESSION['nome'] . "!";
		echo "<br><a href='logout.php'>Logout</a><br><br>";
		echo "<a href='ver.php'>Visualizar e Adicionar Produtos</a><br><br>";
	}
	else { // Se não estiver logado, pede para logar ou cadastrar usuário
		echo "Efetue login abaixo para cadastrar novos itens e visualizar os produtos cadastrados.<br>";
		echo "<a href='login.php' class='button'>Login</a><br><br>";
		echo "Ou então cadastre-se no sistema:<br>";
		echo "<a href='registrar.php' class='button'>Cadastrar-se</a>";
	}
	?>
	<div id="footer">
		Criado por <a href="http://www.bosontreinamentos.com.br" title="Fábio dos Reis - Bóson Treinomentos em Tecnologia" target="_blank">Fábio dos Reis</a>
	</div>
</body>
</html>
