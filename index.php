<?php
try {
	$conexao = new \PDO('mysql:host=localhost;dbname=clientes', 'root', 'admin');
} catch (Exception $e) {
	echo $e->getMessage();	
}
require_once 'cliente.php';


?>

<?php

$cliente = new Cliente($conexao);

$cliente->setNome('Kylo Ren');
$cliente->setEmail('ren@gmail.com');
$cliente->setId(1);

$cli = $cliente->listar();

foreach ($cli as $resultado) {
	echo "id: ";
	echo $resultado['id'];
	echo "<br>";
	echo "nome: ";
	echo $resultado['nome'];
	echo "<br>";
	echo "email: ";
	echo $resultado['email'];
	echo "<br>";
	echo "<br>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="jquery/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<title>Sistema de clientes	</title>
</head>
<body>
	
</body>
</html>