<?php
require_once __DIR__ . '/../controllers/AlunoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new AlunoController();
    $controller->store($_POST);
}
?>

<h2>Cadastrar Novo Aluno</h2>

<form method="POST" action="">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" required>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>

  <div class="mb-3">
    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="index.php?page=alunos" class="btn btn-secondary">Cancelar</a>
</form>
