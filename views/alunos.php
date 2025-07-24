<?php
require_once '../controllers/AlunoController.php';

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 5;

$busca = $_GET['busca'] ?? null;
$alunos = $controller->index($busca);

$controller = new AlunoController();
$resultado = $controller->paged($paginaAtual, $limite);

$alunos = $resultado['dados'];
$totalRegistros = $resultado['total'];
$totalPaginas = ceil($totalRegistros / $limite);
?>

<h2>Lista de Alunos</h2>

<form method="GET" action="index.php" class="row g-2 mb-3">
  <input type="hidden" name="page" value="alunos">
  <div class="col-md-10">
    <input type="text" name="busca" class="form-control" placeholder="Buscar por nome ou e-mail" value="<?= htmlspecialchars($_GET['busca'] ?? '') ?>">
  </div>
  <div class="col-md-2">
    <button type="submit" class="btn btn-primary w-100">🔍 Buscar</button>
  </div>
</form>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Data de Nascimento</th>
      <th class="text-center">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($alunos)) : ?>
      <?php foreach ($alunos as $aluno) : ?>
        <tr>
          <td><?= htmlspecialchars($aluno['id']) ?></td>
          <td><?= htmlspecialchars($aluno['nome']) ?></td>
          <td><?= htmlspecialchars($aluno['email']) ?></td>
          <td><?= !empty($aluno['data_nasc']) ? date('d/m/Y', strtotime($aluno['data_nasc'])) : '' ?></td>

          <td class="text-center">
            <a href="index.php?page=aluno_edit&id=<?= $aluno['id'] ?>" class="btn btn-sm btn-warning">✏️</a>
            <a href="index.php?page=aluno_delete&id=<?= $aluno['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este aluno?');">🗑️</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="5" class="text-center">Nenhum aluno cadastrado.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<a href="index.php?page=aluno_form" class="btn btn-primary mb-3">Novo Aluno</a>

<?php if ($totalPaginas > 1): ?>
  <nav aria-label="Navegação de páginas">
    <ul class="pagination justify-content-center mt-4">
      <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <li class="page-item <?= $i == $paginaAtual ? 'active' : '' ?>">
          <a class="page-link" href="index.php?page=alunos&pagina=<?= $i ?>"><?= $i ?></a>
        </li>
      <?php endfor; ?>
    </ul>
  </nav>
<?php endif; ?>
