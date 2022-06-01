<?php

class FuncionarioDAO
{
    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_projeto_mvc";
        $this->conexao = new PDO($dsn, 'root', 'etecjau');
    }

    
    public function insert(FuncionarioModel $model)
    {
        $sql = "INSERT INTO funcionario (nome, CPF, CNPJ, data_nascimento) VALUES (?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->CPF);
        $stmt->bindValue(3, $model->CNPJ);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->execute();
    }

    //Atualiza o banco
    public function update(FuncionarioModel $model)
    {
        $sql = "UPDATE funcionario SET nome=?, CPF=?, CNPJ=?, data_nascimento=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->CPF);
        $stmt->bindValue(3, $model->CNPJ);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }


    public function select()
    {
        $sql = "SELECT id, nome, CPF, CNPJ, data_nascimento FROM funcionario ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    public function selectById(int $id)
    {
        include_once 'Model/FuncionarioModel.php';

        $sql = "SELECT id, nome, CPF, CNPJ, data_nascimento FROM funcionario WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("FuncionarioModel");
    }


    public function delete(int $id)
    {
        $sql = "DELETE FROM funcionario WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}