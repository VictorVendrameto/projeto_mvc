<?php

class CatProdutoDAO
{
    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_projeto_mvc";
        $this->conexao = new PDO($dsn, 'root', 'etecjau');
    }

    
    public function insert(CatProdutoModel $model)
    {
        $sql = "INSERT INTO categoria_produto (nome, descricao) VALUES (?, ?) ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->execute();
    }

    //Atualiza o banco
    public function update(CatProdutoModel $model)
    {
        $sql = "UPDATE categoria_produto SET nome=?, descricao=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();
    }


    public function select()
    {
        $sql = "SELECT id, nome, descricao FROM categoria_produto ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    public function selectById(int $id)
    {
        include_once 'Model/CatProdutoModel.php';

        $sql = "SELECT id, nome, descricao FROM categoria_produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("CatProdutoModel");
    }


    public function delete(int $id)
    {
        $sql = "DELETE FROM categoria_produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}