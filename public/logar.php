<?php
require_once __DIR__ . '/../config/db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = Database::connect();

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) 
        {
        $_SESSION['usuario'] = $usuario['email'];
        header('Location: index.php?page=cursos');
        exit;
        } 
    else {
        header('Location: login.php?erro=1');
        exit;
        }
}
?>
