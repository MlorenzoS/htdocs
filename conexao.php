<?php
$servidor = "us-cdbr-east-06.cleardb.net";
$usuario = "b93973f17777ee";
$senha = "78b5941e";
$db_name = "heroku_1003938d3b1de4e";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db_name);

// Verifica a conexão
if ($conexao->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conexao->connect_error);
}
?>
