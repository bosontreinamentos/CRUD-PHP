<?php session_start();

if(!isset($_SESSION['aberta'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Adicionar Dados</title>
</head>

<body>
<?php
//Incluir o arquivo de conexão ao banco de dados
include_once("conectar.php");

if(isset($_POST['Submit'])) {	
	$nome = $_POST['nome'];
	$qtde = $_POST['qtde'];
	$preco = $_POST['preco'];
	$loginId = $_SESSION['id'];
		
	// Verificando se há campos vazios
	if(empty($nome) || empty($qtde) || empty($preco)) {
				
		if(empty($nome)) {
			echo "<strong>Campo Nome está vazio.</strong><br>";
		}
		
		if(empty($qtde)) {
			echo "<strong>Campo Quantidade está vazio.</strong><br>";
		}
		
		if(empty($preco)) {
			echo "<strong>Campo Preço está vazio.</strong><br>";
		}
		
		//Link para a página anterior
		echo "<br><a href='javascript:self.history.back();'>Voltar</a>";
	} else { 
		// Se todos os campos estiverem preenchidos (não-vazios) 
			
		//Inserir os dados no banco de dados	
		$result = mysqli_query($strcon, "INSERT INTO produtos(nome, qtde, preco, login_id) VALUES('$nome','$qtde','$preco', '$loginId')");
		
		//Mostrar mensagem de sucesso na operação
		echo "<strong>Item adicionado com sucesso!</strong><br>";
		echo "<br><a href='ver.php'>Visualizar Produtos</a>";
	}
}
?>
</body>
</html>
