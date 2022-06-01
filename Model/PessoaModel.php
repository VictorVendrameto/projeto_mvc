<?php

class PessoaModel
{
    public $id, $nome, $CPF, $data_nascimento;

    public $rows;

    public function save()
    {
        include 'DAO/PessoaDAO.php'; 
        $dao = new PessoaDAO(); 

    
        if(empty($this->id))
        {
            
            $dao->insert($this);

        } else {

            $dao->update($this); 
        }        
    }
    public function getAllRows()
    {
        include 'DAO/PessoaDAO.php';
        
        $dao = new PessoaDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/PessoaDAO.php';

        $dao = new PessoaDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new PessoaModel();

    }

    public function delete(int $id)
    {
        include 'DAO/PessoaDAO.php';

        $dao = new PessoaDAO();

        $dao->delete($id);
    }
    
}   