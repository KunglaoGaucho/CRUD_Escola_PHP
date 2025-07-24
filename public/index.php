<?php
ob_start();
$page = $_GET['page'] ?? null;

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Escola</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <?php include __DIR__ . '/./components/header.php'; ?>
  <main class="container mt-4">

    <?php
    // Rotas de cursos
    if ($page === 'cursos') {
      include '../views/curso.php';
    } 
    elseif ($page === 'curso_form') {
      include __DIR__ . '/../views/curso_form.php';
    } 
    elseif ($page === 'curso_edit') {
      include __DIR__ . '/../views/curso_edit.php';
    }
    elseif ($page === 'curso_delete') {
      require_once __DIR__ . '/../controllers/CursoController.php';
      $controller = new CursoController();
      $controller->delete($_GET['id']);
    }

    // Rotas de Alunos
    elseif ($page === 'alunos') {
      include __DIR__ . '/../views/alunos.php';
    }
    elseif ($page === 'aluno_form') {
      include '../views/aluno_form.php';
    }
    elseif ($page === 'aluno_edit') {
      include __DIR__ . '/../views/aluno_edit.php';
    }

    elseif ($page === 'aluno_delete') {
      require_once __DIR__ . '/../controllers/AlunoController.php';
      $controller = new AlunoController();
      $controller->delete($_GET['id']);
    }

    // Rotas de matrículas
    elseif ($page === 'matriculas') {
      include '../views/matriculas.php';
    }
    elseif ($page === 'matricula_form') {
      include __DIR__ . '/../views/matricula_form.php';
    }
    elseif ($page === 'matricula_delete') {
      require_once __DIR__ . '/../controllers/MatriculaController.php';
      $controller = new MatriculaController();
      $controller->delete($_GET['id']);
    }

    ?>
  </main>

  <?php include __DIR__ . '/./components/footer.php'; ?>
<?php ob_end_flush(); ?>
</body>
</html>