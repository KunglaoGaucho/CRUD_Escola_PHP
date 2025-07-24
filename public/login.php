<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Escola</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">

  <div class="container text-center mt-5">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card shadow p-4">
          <h1 class="mb-4">LOGIN</h1>

          <form action="logar.php" method="post">
            <div class="form-group mb-3 text-start">
              <label for="email">Endereço de email:</label>
              <input type="email" class="form-control" name="email" placeholder="Digite seu email" required>
            </div>

            <div class="form-group mb-3 text-start">
              <label for="senha">Senha:</label>
              <button type="button" onclick="togglePassword()" style="border: none; background: none; cursor: pointer;">👁️</button>
              <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>

            <button type="submit" class="btn btn-warning w-100">Login</button>
          </form>

            <!-- Link para cadastro -->
          <div class="mt-3">
            <p class="mb-0">Não tem uma conta? <a href="registro.php">Cadastre-se aqui</a></p>
          </div>

        </div>
      </div>
    </div>
  </div>

    <?php if (isset($_GET['erro'])) : ?>
        <div class="alert alert-danger" role="alert">
        Email ou senha incorretos.
        </div>
    <?php endif; ?>

  <script>
    function togglePassword() {
      const senhaInput = document.getElementById("senha");
      senhaInput.type = senhaInput.type === "password" ? "text" : "password";
    }
  </script>
</body>
</html>
