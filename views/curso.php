<?php
require_once __DIR__ . '/../controllers/CursoController.php';

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 5;

$controller = new CursoController();
$resultado = $controller->paged($paginaAtual, $limite);

$cursos = $resultado['dados'];
$totalRegistros = $resultado['total'];
$totalPaginas = ceil($totalRegistros / $limite);
?>

<h2>Lista de Cursos</h2>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
  <?php if (!empty($cursos)) : ?>
    <?php foreach ($cursos as $curso) : ?>
      <tr>
        <td><?= htmlspecialchars($curso['id']) ?></td>
        <td><?= htmlspecialchars($curso['nome']) ?></td>
        <td><?= htmlspecialchars($curso['descricao']) ?></td>
        <td class="text-center">
          <a href="index.php?page=curso_edit&id=<?= $curso['id'] ?>" class="btn btn-sm btn-warning">
            ✏️
          </a>
          <a href="index.php?page=curso_delete&id=<?= $curso['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este curso?');">
            🗑️
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  <?php else : ?>
    <tr>
      <td colspan="4">Nenhum curso cadastrado.</td>
    </tr>
  <?php endif; ?>
</tbody>
</table>

<a href="index.php?page=curso_form" class="btn btn-primary mb-3">Novo Curso</a>

<?php if ($totalPaginas > 1): ?>
  <nav aria-label="Navegação de páginas">
    <ul class="pagination justify-content-center mt-4">
      <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <li class="page-item <?= $i == $paginaAtual ? 'active' : '' ?>">
          <a class="page-link" href="index.php?page=cursos&pagina=<?= $i ?>"><?= $i ?></a>
        </li>
      <?php endfor; ?>
    </ul>
  </nav>
<?php endif; ?>