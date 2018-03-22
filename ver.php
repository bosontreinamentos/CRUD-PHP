<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//Incluir o arquivo de conexão ao banco de dados:
include_once("conectar.php");

//buscar os dados em ordem descendente (entrada mais recente primeiro)
$result = mysqli_query($mysqli, "SELECT * FROM produtos WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Página Inicial</title>
</head>

<body>
	<a href="index.php">Início</a> | <a href="adicionar.html">Adicionar Item</a> | <a href="logout.php">Logout</a>
	<br><br>
	<h3>Tabela de Produtos</h3>
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<th>Nome</th>
			<th>Quantidade</th>
			<th>Preço</th>
			<th>Atualizar</th>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['nome']."</td>";
			echo "<td>".$res['qtde']."</td>";
			echo "<td>".$res['preco']."</td>";	
			echo "<td><a href=\"editar.php?id=$res[id]\">Editar</a> | <a href=\"excluir.php?id=$res[id]\" onClick=\"return confirm('Tem certeza de que você deseja excluir?')\">Excluir</a></td>";		
		}
		?>
	</table>	
</body>
</html>
