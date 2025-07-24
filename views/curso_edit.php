<?php
require_once __DIR__ . '/../controllers/CursoController.php';

$controller = new CursoController();

// Pega os dados da área pelo ID (GET)
$curso = $controller->edit($_GET['id']);

// Se for POST, atualiza
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($_POST);
}
?>

<h2>Editar Curso</h2>

<form method="POST" action="">
  <input type="hidden" name="id" value="<?= $curso['id'] ?>">

  <div class="mb-3">
    <label for="nome" class="form-label">Nome da Área</label>
    <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($curso['nome']) ?>" required>
  </div>

  <div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?= htmlspecialchars($curso['descricao']) ?></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Salvar Alterações</button>
  <a href="index.php?page=curso" class="btn btn-secondary">Cancelar</a>
</form>
