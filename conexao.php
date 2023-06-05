<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$db_name = "mercadinho";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db_name);

// Verifica a conexão
if ($conexao->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conexao->connect_error);
}
?>
