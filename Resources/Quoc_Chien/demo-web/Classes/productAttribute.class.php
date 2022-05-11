<?php
class productAttribute extends dbh{
    public $productId;
    public $attributeId;
    public function __construct($productId, $attributeId)
    {
        $this ->attributeId = $attributeId;
        $this ->productId  = $productId;
    }

    public function setProductAttribute()
    {
        $sql = "call proc_productAttribute_insert( ?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute([$this->productId, $this -> attributeId]);
        if($stmt -> rowCount() == 0){
            return false;
        }
        $conn = null;
    }
     public function editProductAttribute__AttributeID(){

        $sql = "call proc_productAttribute_updateAttributeID( ?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);;
        $stmt->execute([$this->productId, $this->attributeId]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }
    public function editProductAttribute_ProductId(){

        $sql = "call proc_productAttribute_updateProductID( ?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);;
        $stmt->execute([$this->attributeId, $this->productId]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }
}