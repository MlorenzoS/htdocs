<!DOCTYPE html>
<html>
<head>
  <title>Cadastro de Fornecedores</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f0f2f5;
      padding-top: 50px;
    }

    .container {
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

    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-size: 16px;
      border: none;
    }

    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Cadastro de Fornecedores</h1>

    <?php
    require_once("conexao.php");

    // Verifica se foi passado o ID do fornecedor para edição
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém os dados do formulário
        $codigo_fornecedor = $_POST['codigo_fornecedor'];
        $nome_fornecedor = $_POST['nome_fornecedor'];
        $cnpj_fornecedor = $_POST['cnpj_fornecedor'];
        $telefone_fornecedor = $_POST['telefone_fornecedor'];
        $email_fornecedor = $_POST['email_fornecedor'];
        $endereco_fornecedor = $_POST['endereco_fornecedor'];

        // Verifica se é uma edição ou um novo cadastro
        if (!empty($id)) {
            // Atualiza os dados do fornecedor no banco de dados
            $sql = "UPDATE fornecedores SET codigo_fornecedor = '$codigo_fornecedor', nome_fornecedor = '$nome_fornecedor', cnpj_fornecedor = '$cnpj_fornecedor', telefone_fornecedor = '$telefone_fornecedor', email_fornecedor = '$email_fornecedor', endereco_fornecedor = '$endereco_fornecedor' WHERE id = $id";

            if ($conexao->query($sql) === TRUE) {
                header('Location: visualizar_fornecedores.php');
                exit();
            } else {
                echo "Erro ao atualizar o fornecedor: " . $conexao->error;
            }
        } else {
            // Insere os dados do fornecedor no banco de dados
            $sql = "INSERT INTO fornecedores (codigo_fornecedor, nome_fornecedor, cnpj_fornecedor, telefone_fornecedor, email_fornecedor, endereco_fornecedor) VALUES ('$codigo_fornecedor', '$nome_fornecedor', '$cnpj_fornecedor', '$telefone_fornecedor', '$email_fornecedor', '$endereco_fornecedor')";

            if ($conexao->query($sql) === TRUE) {
                header('Location: visualizar_fornecedores.php');
                exit();
            } else {
                echo "Erro ao cadastrar o fornecedor: " . $conexao->error;
            }
        }
    }

    // Obtém os dados do fornecedor, se for uma edição
    $fornecedor = null;
    if (!empty($id)) {
        $sql = "SELECT * FROM fornecedores WHERE id = $id";
        $result = $conexao->query($sql);

        if ($result->num_rows == 1) {
            $fornecedor = $result->fetch_assoc();
        } else {
            echo "Fornecedor não encontrado.";
        }
    }

    $conexao->close();
    ?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>">
      <div class="form-group">
        <label for="codigo_fornecedor">Código do Fornecedor:</label>
        <input type="text" name="codigo_fornecedor" value="<?php echo isset($fornecedor['codigo_fornecedor']) ? $fornecedor['codigo_fornecedor'] : ''; ?>" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="nome_fornecedor">Nome do Fornecedor:</label>
        <input type="text" name="nome_fornecedor" value="<?php echo isset($fornecedor['nome_fornecedor']) ? $fornecedor['nome_fornecedor'] : ''; ?>" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="cnpj_fornecedor">CNPJ do Fornecedor:</label>
        <input type="text" name="cnpj_fornecedor" value="<?php echo isset($fornecedor['cnpj_fornecedor']) ? $fornecedor['cnpj_fornecedor'] : ''; ?>" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="telefone_fornecedor">Telefone do Fornecedor:</label>
        <input type="text" name="telefone_fornecedor" value="<?php echo isset($fornecedor['telefone_fornecedor']) ? $fornecedor['telefone_fornecedor'] : ''; ?>" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="email_fornecedor">E-mail do Fornecedor:</label>
        <input type="email" name="email_fornecedor" value="<?php echo isset($fornecedor['email_fornecedor']) ? $fornecedor['email_fornecedor'] : ''; ?>" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="endereco_fornecedor">Endereço do Fornecedor:</label>
        <input type="text" name="endereco_fornecedor" value="<?php echo isset($fornecedor['endereco_fornecedor']) ? $fornecedor['endereco_fornecedor'] : ''; ?>" class="form-control" required>
      </div>

      <input type="submit" value="<?php echo empty($id) ? 'Cadastrar Fornecedor' : 'Atualizar Fornecedor'; ?>" class="button">
    </form>

    <br>

    <a href="visualizar_fornecedores.php" class="button">Visualizar Fornecedores</a>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
