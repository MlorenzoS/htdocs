<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$nome = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Página Restrita</title>
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

    p {
      text-align: center;
    }

    ul {
      list-style: none;
      padding: 0;
      margin-top: 30px;
      text-align: center;
    }

    ul li {
      margin-bottom: 10px;
    }

    ul li a {
      display: block;
      padding: 10px;
      background-color: #1877f2;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    ul li a:hover {
      background-color: #166fe5;
    }

    a.logout-link {
      display: block;
      text-align: center;
      margin-top: 30px;
      color: #1877f2;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Bem-vindo(a), <?php echo $nome; ?>!</h1>

    <p>.</p>

    <ul>
      <li><a href="cadastro_produto.php">Cadastrar Produto</a></li>
      <li><a href="cadastro_fornecedores.php">Cadastrar Fornecedores</a></li>
      <li><a href="visualizar_produtos.php">Visualizar Produtos</a></li>
      <li><a href="visualizar_fornecedores.php">Visualizar Fornecedores</a></li>
    </ul>

    <a href="logout.php" class="logout-link">Sair</a>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
