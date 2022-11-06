<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<title>Votacao</title>
		<link rel="stylesheet" href="./style.css">
	</head>
	<body>
	<header>
        <h1 id="logo">Votação do Melhor Produto </h1>
    </header>

		<center><br><h1>Vote Agora ! </h1><br><center>

		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg']."<br><br>";
			unset($_SESSION['msg']);
		}

		$result_produto = "SELECT * FROM produtos";
		$resultado_produto = mysqli_query($conn, $result_produto);
		
		while($row_produto = mysqli_fetch_assoc($resultado_produto)){
			echo "Número do produto:  " . $row_produto['id'] . "<br>";
			echo "Nome do produto:  " . $row_produto['nome'] . "<br>";
			echo "Quantidade de voto:  " . $row_produto['qnt_voto'] . "<br>";
			echo "<a href='votar.php?id=".$row_produto['id']."'>Votar</a><br><hr>";

		}
		?>
	<footer>
        <p><br>SISTEMA DE VOTAÇÃO</p>
    </footer>
	</body>
</html>