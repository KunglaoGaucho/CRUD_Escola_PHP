<?php
require_once __DIR__ . '/../config/db.php';


class Curso
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    // Método de listagem de areas
    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM cursos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método de paginação
    public function getPaged($offset, $limit)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM cursos LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método necessário para funcionar a paginação
    public function countAll()
    {
        return $this->pdo->query("SELECT COUNT(*) FROM cursos")->fetchColumn();
    }

    // Método de criação de areas
    public function create($nome, $descricao)
    {
        $stmt = $this->pdo->prepare("INSERT INTO cursos (nome, descricao) VALUES (?, ?)");
        return $stmt->execute([$nome, $descricao]);
    }

    // Captura de areas pelo ID para exclusão e edição
    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM cursos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método de atualização de areas
    public function update($id, $nome, $descricao)
    {
        $stmt = $this->pdo->prepare("UPDATE cursos SET nome = ?, descricao = ? WHERE id = ?");
        return $stmt->execute([$nome, $descricao, $id]);
    }

    // Método de deleção de areas
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM cursos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
