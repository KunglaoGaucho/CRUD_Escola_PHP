<?php

require_once __DIR__ . '/../models/matricula.php';

class MatriculaController
{
    private $model;

    // Método construtor de matriculas
    public function __construct()
    {
        $this->model = new Matricula();
    }

    // Lista todas as matrículas, ligando dados do BD com a View
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

    // Cadastra uma nova matrícula, ligando o BD à View
    public function store($aluno_id, $curso_ids)
    {
    $model = new Matricula();
    
    foreach ($curso_ids as $curso_id) {
        $model->create($aluno_id, $curso_id);
    }

    header('Location: index.php?page=matriculas');
    exit;
    }


    // Busca matrícula por ID
    public function edit($id)
    {
        return $this->model->getById($id);
    }

    // Método que atualiza matrícula existente, ligando BD com a View
    public function update($data)
    {
        $id = $data['id'];
        $aluno_id = $data['aluno_id'];
        $curso_id = $data['curso_id'];

        $this->model->update($id, $aluno_id, $curso_id);
        header('Location: index.php?page=matriculas');
        exit;
    }

    // Método de excluir matrícula, ligando BD à View
    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: index.php?page=matriculas');
        exit;
    }
}
