<?php
require_once("conexao.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['usuario'] = $row['usuario'];

        header('Location: pagina_restrita.php');
        exit();
    } else {
        echo "Usuário ou senha inválidos.";
    }
}

$conexao->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
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

    .signup-link {
      text-align: center;
      margin-top: 20px;
    }

    .signup-link a {
      color: #1877f2;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Login</h1>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="usuario">Usuário:</label>
        <input type="text" class="form-control" name="usuario" required>
      </div>

      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" name="senha" required>
      </div>

      <button type="submit" class="btn btn-primary btn-block">Entrar</button>
    </form>

    <div class="signup-link">
      <p>Ainda não possui uma conta? <a href="cadastro_usuario.php">Cadastre-se</a></p>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
