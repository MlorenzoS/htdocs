<?php
require_once("conexao.php");

$codigo_produto = $_POST['codigo_produto'];
$nome_produto = $_POST['nome_produto'];
$descricao_produto = $_POST['descricao_produto'];
$estoque_inicial = $_POST['estoque_inicial'];
$estoque_atual = $_POST['estoque_atual'];
$codigo_fornecedor = $_POST['codigo_fornecedor'];
$preco_compra = $_POST['preco_compra'];
$preco_venda = $_POST['preco_venda'];

$sql = "INSERT INTO produtos (codigo_produto, nome_produto, descricao_produto, estoque_inicial, estoque_atual, codigo_fornecedor, preco_compra, preco_venda) 
        VALUES ('$codigo_produto', '$nome_produto', '$descricao_produto', $estoque_inicial, $estoque_atual, $codigo_fornecedor, '$preco_compra', '$preco_venda')";

if ($conexao->query($sql) === TRUE) {
    echo "Produto cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o produto: " . $conexao->error;
}

$conexao->close();
?>
