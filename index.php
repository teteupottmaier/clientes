<?php
try {
	$conexao = new \PDO('mysql:host=localhost;dbname=clientes', 'root', 'admin');
} catch (Exception $e) {
	echo $e->getMessage();	
}
require_once 'cliente.php';

$cliente = new Cliente($conexao);

$cliente->setNome('Kylo Ren');
$cliente->setEmail('ren@gmail.com');
$cliente->setId(1);

$cliente->inserir();

?>