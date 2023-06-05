<?php
require_once("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (nome, usuario, senha) VALUES ('$nome', '$usuario', '$senha')";

    if ($conexao->query($sql) === TRUE) {
        header('Location: login.php');
        exit();
    } else {
        echo "Erro ao cadastrar o usuário: " . $conexao->error;
    }
}

$conexao->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cadastro de Usuário</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f0f2f5;
    }

    .container {
      margin-top: 100px;
      max-width: 400px;
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

    label {
      font-weight: bold;
    }

    .form-control {
      margin-bottom: 20px;
    }

    .btn {
      background-color: #1877f2;
      border-color: #1877f2;
    }

    .btn:hover {
      background-color: #166fe5;
      border-color: #166fe5;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Cadastro de Usuário</h1>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" required>
      </div>

      <div class="form-group">
        <label for="usuario">Usuário:</label>
        <input type="text" class="form-control" name="usuario" required>
      </div>

      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" name="senha" required>
      </div>

      <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
