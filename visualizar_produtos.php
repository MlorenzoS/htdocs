<?php
require_once("conexao.php");

$sql = "SELECT * FROM produtos";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Visualizar Produtos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f0f2f5;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #1877f2;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    a {
      color: #1877f2;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-size: 16px;
      border: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Produtos Cadastrados</h1>

    <table class="table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Estoque Inicial</th>
          <th>Estoque Atual</th>
          <th>Código Fornecedor</th>
          <th>Preço de Compra</th>
          <th>Preço de Venda</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['codigo_produto'] . "</td>";
                echo "<td>" . $row['nome_produto'] . "</td>";
                echo "<td>" . $row['descricao_produto'] . "</td>";
                echo "<td>" . $row['estoque_inicial'] . "</td>";
                echo "<td>" . $row['estoque_atual'] . "</td>";
                echo "<td>" . $row['codigo_fornecedor'] . "</td>";
                echo "<td>" . $row['preco_compra'] . "</td>";
                echo "<td>" . $row['preco_venda'] . "</td>";
                echo "<td><a href='cadastro_produto.php?id=" . $row['id'] . "'>Editar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Nenhum produto cadastrado.</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <br>

    <a href="cadastro_produto.php" class="btn">Novo Cadastro</a>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
