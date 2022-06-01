<?php

class CatProdutoModel
{
    public $id, $nome, $descricao;

    public $rows;

    public function save()
    {
        include 'DAO/CatProdutoDAO.php'; 
        $dao = new CatProdutoDAO(); 

    
        if(empty($this->id))
        {
            
            $dao->insert($this);

        } else {

            $dao->update($this); 
        }        
    }
    public function getAllRows()
    {
        include 'DAO/CatProdutoDAO.php';
        
        $dao = new CatProdutoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/CatProdutoDAO.php';

        $dao = new CatProdutoDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new CatProdutoModel();

    }

    public function delete(int $id)
    {
        include 'DAO/CatProdutoDAO.php';

        $dao = new CatProdutoDAO();

        $dao->delete($id);
    }
    
}   