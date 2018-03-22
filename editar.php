<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// Incuir o arquivo de conexão ao banco de dados
include_once("conectar.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$nome = $_POST['nome'];
	$qtde = $_POST['qtde'];
	$preco = $_POST['preco'];	
	
	// Verificando se há campos vazios:
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
	} else {	
		//Atualizando a tabela
		$result = mysqli_query($mysqli, "UPDATE produtos SET nome='$nome', qtde='$qtde', preco='$preco' WHERE id=$id");
		
		//Redirecionar para a página de visualização -> ver.php
		header("Location: ver.php");
	}
}
?>
<?php
//Obtendo o id a partir da URL
$id = $_GET['id'];

//Selecionando dados associados com o id em particular:
$result = mysqli_query($mysqli, "SELECT * FROM produtos WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nome = $res['nome'];
	$qtde = $res['qtde'];
	$preco = $res['preco'];
}
?>
<html>
<head>	
	<title>Editar Dados</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="ver.php">Ver Produtos</a> | <a href="logout.php">Logout</a>
	<br><br>
	
	<form nome="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>Nome</td>
				<td><input type="text" name="nome" value="<?php echo $nome;?>"></td>
			</tr>
			<tr> 
				<td>Quantidade</td>
				<td><input type="text" name="qtde" value="<?php echo $qtde;?>"></td>
			</tr>
			<tr> 
				<td>Preço</td>
				<td><input type="text" name="preco" value="<?php echo $preco;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Atualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
