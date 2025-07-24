<!-- Header do projeto onde contém a NAVbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="">Escola</a>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=cursos">Cursos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=alunos">Alunos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=matriculas">Matrículas</a>
        </li>
        <?php if (isset($_SESSION['usuario'])) : ?>
        <a href="logout.php" class="btn btn-outline-danger">Sair</a>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
