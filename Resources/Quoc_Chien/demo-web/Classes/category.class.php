<?php

class category extends dbh {
    public $categoryId;
    public $nameCategory;
    public $descriptionCategory;
    function __construct($categoryId, $nameCategory, $descriptionCategory)
    {
        $this -> categoryId = $categoryId  ;
        $this -> nameCategory = $nameCategory;
        $this -> descriptionCategory = $descriptionCategory;
    }

    public function setCategory(){

        $sql = "call proc_category_insert( ?,?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute([$this->categoryId, $this->nameCategory, $this->descriptionCategory]);
        $count = $stmt ->rowCount();
        if ($count = 0) {
            return false;


        }
        $conn = null;
    }
    public function getCategory(){
        $sql = "call proc_category_select( ?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute([$this->categoryId, $this -> nameCategory]);
        $data = $stmt->fetchAll();
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
        $conn = null;
    }
    public function editCategory()
    {
        $sql = "call proc_category_update( ?,?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute([$this->categoryId, $this->nameCategory, $this->descriptionCategory]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;

        }
        $conn = null;
    }
}