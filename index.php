<?php

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//echo $uri_parse;
//echo "<hr />";

include 'Controller/ProdutoController.php';
include 'Controller/FuncionarioController.php';
include 'Controller/PessoaController.php';
include 'Controller/CatProdutoController.php';

switch($uri_parse)
{
    //produto
    case '/produto':
        ProdutoController::index();
    break;
    
    case '/produto/form':
        ProdutoController::form();
    break;
    case '/produto/form/save':
        ProdutoController::save();
    break;
    case '/produto/delete':
        ProdutoController::delete();
    break;

    //funcionario
    case '/funcionario':
        FuncionarioController::index();
    break;
    
    case '/funcionario/form':
        FuncionarioController::form();
    break;
    case '/funcionario/form/save':
        FuncionarioController::save();
    break;
    case '/funcionario/delete';
        FuncionarioController::delete();
    break;
    
    //pessoa
    case '/pessoa':
        PessoaController::index();
    break;
    case '/pessoa/form':
        PessoaController::form();
    break;
    case '/pessoa/form/save':
        PessoaController::save();
    break;
    case '/pessoa/delete';
        PessoaController::delete();
    break;

    //categoria produto
    case '/categoria':
        CatProdutoController::index();
    break;
    case '/categoria/form':
        CatProdutoController::form();
    break;
    case '/categoria/form/save':
        CatProdutoController::save();
    break;
    case '/categoria/delete';
        CatProdutoController::delete();
    break;
    default:
        echo "Erro 404";
    break;
}