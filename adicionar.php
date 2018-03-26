<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
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
			echo "<font color='red'>Campo Nome está vazio.</font><br>";
		}
		
		if(empty($qtde)) {
			echo "<font color='red'>Campo Quantidade está vazio.</font><br>";
		}
		
		if(empty($preco)) {
			echo "<font color='red'>Campo Preço está vazio.</font><br>";
		}
		
		//Link para a página anterior
		echo "<br><a href='javascript:self.history.back();'>Voltar</a>";
	} else { 
		// Se todos os campos estiverem preenchidos (não-vazios) 
			
		//Inserir os dados no banco de dados	
		$result = mysqli_query($strcon, "INSERT INTO produtos(nome, qtde, preco, login_id) VALUES('$nome','$qtde','$preco', '$loginId')");
		
		//Mostrar mensagem de sucesso na operação
		echo "<font color='green'>Item adicionado com sucesso!";
		echo "<br><a href='ver.php'>Visualizar Produtos</a>";
	}
}
?>
</body>
</html>
