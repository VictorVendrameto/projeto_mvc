<?php
//categoria produto
class CatProdutoController
{
    //função de view
    public static function index()
    {
        include 'Model/CatProdutoModel.php';
        
        $model = new CatProdutoModel();
        $model->getAllRows();
        
        include 'View/modules/Categorias/CatProdutoListar.php';
    }

    //cria função form
    public static function form()
    {
        include 'Model/CatProdutoModel.php';

        $model = new CatProdutoModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);

        

        include 'View/modules/Categorias/CatProdutoCadastro.php';
    }

    //função de salvar
    public static function save()
    {
        include 'Model/CatProdutoModel.php';

        $model = new CatProdutoModel();
        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->descricao = $_POST['descricao'];

        $model->save();

        header("Location: /categoria"); // redirecionando o usuário para outra rota.
    }

    public static function delete()
    {
        include 'Model/CatProdutoModel.php';

        $model = new CatProdutoModel();

        $model->delete( (int) $_GET['id']);

        header("Location: /categoria");
    }
} 