<?php

class FuncionarioController
{
    //função de view
    public static function index()
    {
        include 'Model/FuncionarioModel.php';
        
        $model = new FuncionarioModel();
        $model->getAllRows();
        
        include 'View/modules/Funcionarios/FuncionarioListar.php';
    }

    //cria função form
    public static function form()
    {
        include 'Model/FuncionarioModel.php';

        $model = new FuncionarioModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);

        

        include 'View/modules/Funcionarios/FuncionarioCadastro.php';
    }

    //função de salvar
    public static function save()
    {
        include 'Model/FuncionarioModel.php';

        $model = new FuncionarioModel();
        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->CPF = $_POST['CPF'];
        $model->CNPJ = $_POST['CNPJ'];
        $model->data_nascimento = $_POST['data_nascimento'];

        $model->save();

        header("Location: /funcionario"); // redirecionando o usuário para outra rota.
    }

    public static function delete()
    {
        include 'Model/FuncionarioModel.php';

        $model = new FuncionarioModel();

        $model->delete( (int) $_GET['id']);

        header("Location: /funcionario");
    }
}   
