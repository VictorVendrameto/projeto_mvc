<?php

class PessoaDAO
{
    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_projeto_mvc";
        $this->conexao = new PDO($dsn, 'root', 'etecjau');
    }

    
    public function insert(PessoaModel $model)
    {
        $sql = "INSERT INTO pessoa (nome, CPF, data_nascimento) VALUES (?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->CPF);
        $stmt->bindValue(3, $model->data_nascimento);
        $stmt->execute();
    }

    //Atualiza o banco
    public function update(PessoaModel $model)
    {
        $sql = "UPDATE pessoa SET nome=?, CPF=?, data_nascimento=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->CPF);
        $stmt->bindValue(3, $model->data_nascimento);
        $stmt->bindValue(4, $model->id);
        $stmt->execute();
    }


    public function select()
    {
        $sql = "SELECT id, nome, CPF, data_nascimento FROM pessoa ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    public function selectById(int $id)
    {
        include_once 'Model/PessoaModel.php';

        $sql = "SELECT id, nome, CPF, data_nascimento FROM pessoa WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("PessoaModel");
    }


    public function delete(int $id)
    {
        $sql = "DELETE FROM pessoa WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}