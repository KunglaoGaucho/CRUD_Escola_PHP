<?php

echo "ENTROU NA VIEW DE MATRÍCULA<br>";
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../controllers/AlunoController.php';
require_once __DIR__ . '/../controllers/AreaController.php';
require_once __DIR__ . '/../controllers/MatriculaController.php';

// Instanciando controllers para carregar os dados
$alunoController = new AlunoController();
$cursoController = new CursoController();

$alunos = $alunoController->index();
$cursos = $cursoController->index();

// Se for um POST, cadastrar a matrícula
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matriculaController = new MatriculaController();
    $matriculaController->store($_POST['aluno_id'], $_POST['cursos']);
}
?>

<h2>Cadastrar Nova Matrícula</h2>

<form method="POST" action="">
  <div class="mb-3">
    <label for="aluno_id" class="form-label">Aluno</label>
    <select name="aluno_id" id="aluno_id" class="form-select" required>
      <option value="">Selecione um aluno</option>
      <?php foreach ($alunos as $aluno) : ?>
        <option value="<?= $aluno['id'] ?>"><?= htmlspecialchars($aluno['nome']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="cursos" class="form-label">Cursos</label>
    <select name="cursos[]" id="cursos" class="form-control" multiple required>
    <?php foreach ($cursos as $curso): ?>
      <option value="<?= $curso['id'] ?>"><?= htmlspecialchars($curso['nome']) ?></option>
    <?php endforeach; ?>
    </select>
    <small class="form-text text-muted">Segure Ctrl (Windows) ou Command (Mac) para selecionar mais de um curso.</small>
</div>

  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="index.php?page=matriculas" class="btn btn-secondary">Cancelar</a>
</form>
