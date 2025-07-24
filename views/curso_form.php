<?php
require_once __DIR__ . '/../controllers/CursoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new CursoController();
    $controller->store($_POST);
}
?>

<h2>Cadastrar Novo Curso</h2>

<form method="POST" action="">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome do Curso</label>
    <input type="text" class="form-control" id="nome" name="nome" required>
  </div>

  <div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
  </div>
  
  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="index.php?page=cursos" class="btn btn-secondary">Cancelar</a>
</form>
