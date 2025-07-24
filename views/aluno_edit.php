<?php
require_once __DIR__ . '/../controllers/AlunoController.php';

// Verifica se veio um ID pela URL
if (!isset($_GET['id'])) {
    echo "ID do aluno não informado.";
    exit;
}

$id = $_GET['id'];
$controller = new AlunoController();
$aluno = $controller->edit($id);

// Verifica se encontrou o aluno
if (!$aluno) {
    echo "Aluno não encontrado.";
    exit;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($_POST);
}
?>

<h2>Editar Aluno</h2>

<form method="POST" action="">
  <input type="hidden" name="id" value="<?= htmlspecialchars($aluno['id']) ?>">

  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($aluno['nome']) ?>" required>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($aluno['email']) ?>" required>
  </div>

  <div class="mb-3">
    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= htmlspecialchars($aluno['data_nasc']) ?>" required>
  </div>

  <button type="submit" class="btn btn-primary">Salvar Alterações</button>
  <a href="index.php?page=alunos" class="btn btn-secondary">Cancelar</a>
</form>
