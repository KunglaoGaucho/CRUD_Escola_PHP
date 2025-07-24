<?php
require_once __DIR__ . '/../config/db.php';

class Aluno
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    // Método de listagem de alunos
    public function getAll($busca = null)
    {
        if ($busca) {
            $stmt = $this->pdo->prepare("SELECT * FROM alunos WHERE nome LIKE ? OR email LIKE ?");
            $busca = '%' . $busca . '%';
            $stmt->execute([$busca, $busca]);
        } 
        else {
            $stmt = $this->pdo->query("SELECT * FROM alunos");
         }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método de paginação
    public function getPaged($offset, $limit)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM alunos LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método necessário para funcionar a paginação
    public function countAll()
    {
        return $this->pdo->query("SELECT COUNT(*) FROM alunos")->fetchColumn();
    }

    // Método para buscar elementos pelo ID para exclusão e alteração
    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM alunos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método de adição de alunos
    public function create($nome, $email, $dataNascimento)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM alunos WHERE email = ?");
        $stmt->execute([$email]);
        $existe = $stmt->fetchColumn();

         if ($existe > 0) {
            return false;
        }
        $stmt = $this->pdo->prepare("INSERT INTO alunos (nome, email, data_nasc) VALUES (?, ?, ?)");
        return $stmt->execute([$nome, $email, $dataNascimento]);
    }

    // Método de atualização de alunos
    public function update($id, $nome, $email, $dataNascimento)
    {
        $stmt = $this->pdo->prepare("UPDATE alunos SET nome = ?, email = ?, data_nasc = ? WHERE id = ?");
        return $stmt->execute([$nome, $email, $dataNascimento, $id]);
    }

    // Método de deleção de alunos
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM alunos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
    