<?php

class ProdutoController
{
    //função de view
    public static function index()
    {
        include 'Model/ProdutoModel.php';
        
        $model = new ProdutoModel();
        $model->getAllRows();
        
        include 'View/modules/Produto/ProdutoListar.php';
    }

    //cria função form
    public static function form()
    {
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);

        

        include 'View/modules/Produto/ProdutoCadastro.php';
    }

    //função de salvar
    public static function save()
    {
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();
        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->preco = $_POST['preco'];
        $model->descricao = $_POST['descricao'];

        $model->save();

        header("Location: /produto"); // redirecionando o usuário para outra rota.
    }

    public static function delete()
    {
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id']);

        header("Location: /produto");
    }
}   
