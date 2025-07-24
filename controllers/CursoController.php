<?php
require_once __DIR__ . '/../models/curso.php';


class CursoController
{
    private $model;

    // Método construtor de Cursos
    public function __construct()
    {
        $this->model = new Curso();
    }

    // Lista todos os cursos (usado no index.php)
    public function index()
    {
        return $this->model->getAll();
    }

    // Adiciona paginação ao módulo
    public function paged($pagina = 1, $limite = 5)
    {
        $offset = ($pagina - 1) * $limite;
        $dados = $this->model->getPaged($offset, $limite);
        $total = $this->model->countAll();
        return ['dados' => $dados, 'total' => $total];
    }

    // Método de criar nova área que ligará o BD à View
    public function store($data)
    {
        $nome = trim($data['nome']);
        $descricao = trim($data['descricao']);
        $this->model->create($nome, $descricao);
        header('Location: index.php?page=cursos');
        exit;
    }

    // Método de atualizar um curso existente, ligando com a view
    public function update($data)
    {
        $id = $data['id'];
        $nome = trim($data['nome']);
        $descricao = trim($data['descricao']);
        $this->model->update($id, $nome, $descricao);

        header('Location: index.php?page=cursos');
        exit;
    }

    // Busca os dados de um curso específico (para edição)
    public function edit($id)
    {
        return $this->model->getById($id);
    }

    // Método que exclui um curso, ligando BD à view
    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: index.php?page=cursos');
        exit;
    }
}
