<?php
require_once __DIR__ . '/../config/db.php';

class Matricula
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    // Lista todas as matrículas com JOIN para mostrar nome do aluno e do curso
    public function getAll()
    {
        $stmt = $this->pdo->query("
            SELECT m.id, a.nome AS aluno, c.nome AS curso
            FROM matriculas m
            JOIN alunos a ON m.aluno_id = a.id
            JOIN cursos c ON m.curso_id = c.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método de paginação
   public function getPaged($offset, $limite)
    {
    $stmt = $this->pdo->prepare("
        SELECT m.id, a.nome AS aluno, c.nome AS curso
        FROM matriculas m
        JOIN alunos a ON m.aluno_id = a.id
        JOIN cursos c ON m.curso_id = c.id
        LIMIT :limite OFFSET :offset
    ");

    $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Método necessário para funcionar a paginação
    public function countAll()
    {
        return $this->pdo->query("SELECT COUNT(*) FROM cursos")->fetchColumn();
    }


    // Cria uma nova matrícula
    public function create($aluno_id, $curso_id)
    {
        $stmt = $this->pdo->prepare("INSERT INTO matriculas (aluno_id, curso_id) VALUES (?, ?)");
        return $stmt->execute([$aluno_id, $curso_id]);
    }

    // Busca matrícula por ID (para edição)
    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM matriculas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualiza matrícula
    public function update($id, $aluno_id, $curso_id)
    {
        $stmt = $this->pdo->prepare("UPDATE matriculas SET aluno_id = ?, curso_id = ? WHERE id = ?");
        return $stmt->execute([$aluno_id, $curso_id, $id]);
    }

    // Exclui matrícula
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM matriculas WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
