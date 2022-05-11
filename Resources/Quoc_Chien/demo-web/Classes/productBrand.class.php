<?php

class productBrand extends dbh
{
    public $productId;
    public $brandId;

    function __construct($productId, $brandId)
    {
        $this->productId = $productId;
        $this->brandId = $brandId;
    }

    public function setProductBrand()
    {
        $sql = "call proc_productBrand_insert( ?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->productId, $this->brandId]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }

    public function editProductBrand__BrandId(){

        $sql = "call proc_productBrand_updateBrandID( ?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);;
        $stmt->execute([$this->productId, $this->brandId]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }
    public function editProductBrand__ProductId(){

        $sql = "call proc_productBrand_updateProductID( ?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);;
        $stmt->execute([$this->brandId, $this->productId]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }



}