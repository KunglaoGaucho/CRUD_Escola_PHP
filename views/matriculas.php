<?php
require_once __DIR__ . '/../controllers/MatriculaController.php';


$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 5;

$controller = new MatriculaController();
$resultado = $controller->paged($paginaAtual, $limite);

$matriculas = $resultado['dados'];
$totalRegistros = $resultado['total'];
$totalPaginas = ceil($totalRegistros / $limite);
?>

<h2>Lista de Matrículas</h2>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Aluno</th>
      <th>Curso</th>
      <th class="text-center">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($matriculas)) : ?>
      <?php foreach ($matriculas as $matricula) : ?>
        <tr>
          <td><?= htmlspecialchars($matricula['id']) ?></td>
          <td><?= htmlspecialchars($matricula['aluno']) ?></td>
          <td><?= htmlspecialchars($matricula['curso']) ?></td>
          <td class="text-center">
            <a href="index.php?page=matricula_edit&id=<?= $matricula['id'] ?>" class="btn btn-sm btn-warning">✏️</a>
            <a href="index.php?page=matricula_delete&id=<?= $matricula['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir esta matrícula?');">🗑️</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="4" class="text-center">Nenhuma matrícula cadastrada.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<a href="index.php?page=matricula_form" class="btn btn-primary mb-3">Nova Matrícula</a>

<?php if ($totalPaginas > 1): ?>
  <nav aria-label="Navegação de páginas">
    <ul class="pagination justify-content-center mt-4">
      <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <li class="page-item <?= $i == $paginaAtual ? 'active' : '' ?>">
          <a class="page-link" href="index.php?page=matriculas&pagina=<?= $i ?>"><?= $i ?></a>
        </li>
      <?php endfor; ?>
    </ul>
  </nav>
<?php endif; ?>