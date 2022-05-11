<?php

class category extends dbh
{


    public function setCategory($nameCategory)
    {

        $sql = "call proc_category_insert( ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nameCategory]);
        $conn = null;
    }

    public function getCategoryName($nameCategory)
    {
        $sql = "call proc_category_selectName(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nameCategory]);
        $data = $stmt->fetchAll();
        return $data;
        $conn = null;
    }

    public function getCategoryID($categoryId)
    {
        $sql = "call proc_category_selectID(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$categoryId]);
        $data = $stmt->fetchAll();
        return $data;
        $conn = null;
    }

    public function getCategoryAll()
    {
        $sql = "call proc_category_selectAll()";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
        $conn = null;
    }

    public function editCategory($categoryId, $nameCategory)
    {
        $sql = "call proc_category_update( ?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$categoryId, $nameCategory]);
        $conn = null;
    }

    public function deleteCategory($categoryId)
    {
        $sql = "call proc_category_delete( ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$categoryId]);
        $conn = null;
    }
}