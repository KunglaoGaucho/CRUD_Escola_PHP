<?php
require_once __DIR__ . '/../models/Aluno.php';

class AlunoController
{
    private $model;

    // Método construtor de alunos
    public function __construct()
    {
        $this->model = new Aluno();
    }

    // Lista todos os cursos, ligando dados do BD om a View
    public function index($busca = null)
    {
        return $this->model->getAll($busca);
    }

    // Método de criação no BD para fazer a ligação com a View
    public function store($data)
    {   
        $nome = trim($data['nome']);
        $email = trim($data['email']);
        $dataNascimento = $data['data_nascimento'];

        $this->model->create($nome, $email, $dataNascimento);
        header('Location: index.php?page=alunos');
        exit;
    }

    // Adiciona paginação ao módulo
    public function paged($pagina = 1, $limite = 5, $busca = NULL)
    {
        $offset = ($pagina - 1) * $limite;
        $dados = $this->model->getPaged($offset, $limite, $busca);
        $total = $this->model->countAll($busca);
        return ['dados' => $dados, 'total' => $total];
    }

    // Busca o método de captura de ID do BD
    public function edit($id)
    {
        return $this->model->getById($id);
    }

    // Busca o método de atualização no BD para fazer a ligação com a View
    public function update($data)
    {
        $id = $data['id'];
        $nome = trim($data['nome']);
        $email = trim($data['email']);
        $dataNascimento = $data['data_nascimento'];

        $this->model->update($id, $nome, $email, $dataNascimento);
        header('Location: index.php?page=alunos');
        exit;
    }

    // Busca o método de deleção no BD para fazer a ligação com a View
    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: index.php?page=alunos');
        exit;
    }
}
