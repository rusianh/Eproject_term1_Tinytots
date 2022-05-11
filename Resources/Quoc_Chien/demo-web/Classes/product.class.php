<?php
class product extends dbh {
    public $productId;
    public $productName;
    public $dowload;
    public $productDescription;

    function product($productId,$productName, $dowload, $productDescription)
    {
        $this ->productId = $productId;
        $this ->productName = $productName;
        $this -> dowload = $dowload;
        $this -> productDescription = $productDescription;
    }

    public function setProduct(){
        $sql = "call proc_product_insert( ?,?,?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute([$this->productId, $this->productName, $this->dowload, $this ->productDescription]);
        $count = $stmt ->rowCount();
        if ($count = 0) {
            return false;

        }
        $conn = null;
    }
     public function getProductAll()
    {
        $sql = "call proc_product_selectAll()";
         $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
        $conn = null;

    }
    public function getProductId(){
        $sql = "call proc_product_selectID(?)";
         $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute($this -> productId);
        $data = $stmt->fetchAll();
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
        $conn = null;
    }
     public function getProductName(){
        $sql = "call proc_product_selectName(?)";
         $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute($this -> productName);
        $data = $stmt->fetchAll();
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
        $conn = null;
    }
    public function editProduct()
    {
        $sql = "call proc_product_update( ?,?,?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);;
        $stmt->execute([$this->productId, $this->productName, $this->dowload, $this->productDescription]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;

    }


}