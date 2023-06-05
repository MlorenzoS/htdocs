<?php
require_once("conexao.php");

$id = $_GET['id'] ?? null;

// Variáveis para armazenar os dados do produto
$codigo_produto = '';
$nome_produto = '';
$descricao_produto = '';
$estoque_inicial = '';
$estoque_atual = '';
$codigo_fornecedor = '';
$preco_compra = '';
$preco_venda = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados do formulário
    $codigo_produto = $_POST['codigo_produto'];
    $nome_produto = $_POST['nome_produto'];
    $descricao_produto = $_POST['descricao_produto'];
    $estoque_inicial = $_POST['estoque_inicial'];
    $estoque_atual = $_POST['estoque_atual'];
    $codigo_fornecedor = $_POST['codigo_fornecedor'];
    $preco_compra = $_POST['preco_compra'];
    $preco_venda = $_POST['preco_venda'];

    // Verificar se é uma edição ou novo cadastro
    if ($id) {
        $sql = "UPDATE produtos SET codigo_produto='$codigo_produto', nome_produto='$nome_produto', descricao_produto='$descricao_produto', estoque_inicial=$estoque_inicial, estoque_atual=$estoque_atual, codigo_fornecedor=$codigo_fornecedor, preco_compra='$preco_compra', preco_venda='$preco_venda' WHERE id=$id";
    } else {
        $sql = "INSERT INTO produtos (codigo_produto, nome_produto, descricao_produto, estoque_inicial, estoque_atual, codigo_fornecedor, preco_compra, preco_venda) VALUES ('$codigo_produto', '$nome_produto', '$descricao_produto', $estoque_inicial, $estoque_atual, $codigo_fornecedor, '$preco_compra', '$preco_venda')";
    }

    if ($conexao->query($sql) === TRUE) {
        header('Location: visualizar_produtos.php');
        exit();
    } else {
        echo "Erro ao cadastrar o produto: " . $conexao->error;
    }
} else {
    // Verificar se é uma edição e obter os dados do produto
    if ($id) {
        $sql = "SELECT * FROM produtos WHERE id=$id";
        $result = $conexao->query($sql);

        if ($result->num_rows === 1) {
            $produto = $result->fetch_assoc();
            $codigo_produto = $produto['codigo_produto'];
            $nome_produto = $produto['nome_produto'];
            $descricao_produto = $produto['descricao_produto'];
            $estoque_inicial = $produto['estoque_inicial'];
            $estoque_atual = $produto['estoque_atual'];
            $codigo_fornecedor = $produto['codigo_fornecedor'];
            $preco_compra = $produto['preco_compra'];
            $preco_venda = $produto['preco_venda'];
        } else {
            echo "Produto não encontrado.";
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cadastro de Produtos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f0f2f5;
    }

    .container {
      margin-top: 50px;
      max-width: 800px;
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #1877f2;
    }

    form label {
      font-weight: bold;
    }

    form input[type="text"],
    form input[type="number"],
    form textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    form input[type="submit"],
    a.btn {
      display: inline-block;
      padding: 10px 20px;
      color: #fff;
      background-color: #1877f2;
      border: none;
      border-radius: 4px;
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    form input[type="submit"]:hover,
    a.btn:hover {
      background-color: #166fe5;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Cadastro de Produtos</h1>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>">
      <div class="form-group">
        <label for="codigo_produto">Código do Produto:</label>
        <input type="text" name="codigo_produto" value="<?php echo $codigo_produto; ?>" required>
      </div>

      <div class="form-group">
        <label for="nome_produto">Nome do Produto:</label>
        <input type="text" name="nome_produto" value="<?php echo $nome_produto; ?>" required>
      </div>

      <div class="form-group">
        <label for="descricao_produto">Descrição do Produto:</label>
        <textarea name="descricao_produto"><?php echo $descricao_produto; ?></textarea>
      </div>

      <div class="form-group">
        <label for="estoque_inicial">Estoque Inicial:</label>
        <input type="number" name="estoque_inicial" value="<?php echo $estoque_inicial; ?>" required>
      </div>

      <div class="form-group">
        <label for="estoque_atual">Estoque Atual:</label>
        <input type="number" name="estoque_atual" value="<?php echo $estoque_atual; ?>" required>
      </div>

      <div class="form-group">
        <label for="codigo_fornecedor">Código do Fornecedor:</label>
        <input type="number" name="codigo_fornecedor" value="<?php echo $codigo_fornecedor; ?>" required>
      </div>

      <div class="form-group">
        <label for="preco_compra">Preço de Compra:</label>
        <input type="text" name="preco_compra" value="<?php echo $preco_compra; ?>" required>
      </div>

      <div class="form-group">
        <label for="preco_venda">Preço de Venda:</label>
        <input type="text" name="preco_venda" value="<?php echo $preco_venda; ?>" required>
      </div>

      <div class="form-group">
        <input type="submit" value="Salvar Produto" class="btn btn-primary">
      </div>
    </form>

    <a href="visualizar_produtos.php" class="btn btn-primary">Visualizar Produtos</a>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
