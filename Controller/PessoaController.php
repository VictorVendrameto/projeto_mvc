<?php

class PessoaController
{
    //função de view
    public static function index()
    {
        include 'Model/PessoaModel.php';
        
        $model = new PessoaModel();
        $model->getAllRows();
        
        include 'View/modules/Pessoas/PessoaListar.php';
    }

    //cria função form
    public static function form()
    {
        include 'Model/PessoaModel.php';

        $model = new PessoaModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);

        

        include 'View/modules/Pessoas/PessoaCadastro.php';
    }

    //função de salvar
    public static function save()
    {
        include 'Model/PessoaModel.php';

        $model = new PessoaModel();
        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->CPF = $_POST['CPF'];
        $model->data_nascimento = $_POST['data_nascimento'];

        $model->save();

        header("Location: /pessoa"); // redirecionando o usuário para outra rota.
    }

    public static function delete()
    {
        include 'Model/PessoaModel.php';

        $model = new PessoaModel();

        $model->delete( (int) $_GET['id']);

        header("Location: /pessoa");
    }
} 