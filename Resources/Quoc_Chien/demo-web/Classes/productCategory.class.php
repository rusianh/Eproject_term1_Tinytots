<?php

class productCategory extends dbh{
    public $productId;
    public $categoryId;
     function __construct($productId, $categoryId)
     {
         $this ->productId;
         $this -> categoryId;
     }
    public function setProductBrand()
    {
        $sql = "call proc_productCategory_insert( ?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->productId, $this->categoryId]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }

    public function editProductCategory__CategoryId(){

        $sql = "call proc_productCategory_updateCategoryID( ?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);;
        $stmt->execute([$this->productId, $this->categoryId]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }
    public function editProductCategory__ProductId(){

        $sql = "call proc_productCategory_updateProductID( ?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);;
        $stmt->execute([$this->categoryId, $this->productId]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }
}