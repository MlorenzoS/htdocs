<?php
require_once("conexao.php");

// Obtém todos os fornecedores cadastrados
$sql = "SELECT * FROM fornecedores";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Visualizar Fornecedores</title>
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
    <h1>Fornecedores Cadastrados</h1>

    <table class="table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Nome</th>
          <th>CNPJ</th>
          <th>Telefone</th>
          <th>Email</th>
          <th>Endereço</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['codigo_fornecedor'] . "</td>";
                echo "<td>" . $row['nome_fornecedor'] . "</td>";
                echo "<td>" . $row['cnpj_fornecedor'] . "</td>";
                echo "<td>" . $row['telefone_fornecedor'] . "</td>";
                echo "<td>" . $row['email_fornecedor'] . "</td>";
                echo "<td>" . $row['endereco_fornecedor'] . "</td>";
                echo "<td><a href='cadastro_fornecedores.php?id=" . $row['id'] . "'>Editar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Nenhum fornecedor cadastrado.</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <br>

    <a href="cadastro_fornecedores.php" class="btn">Novo Cadastro</a>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
