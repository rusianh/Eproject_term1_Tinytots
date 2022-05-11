<?php
class productAttribute extends dbh{
    /*public $productId;
    public $attributeId;
    public function __construct($productId, $attributeId)
    {
        $this ->attributeId = $attributeId;
        $this ->productId  = $productId;
    }*/

    public function setProductAttribute($productId, $attributeId)
    {
        $sql = "call proc_productAttribute_insert( ?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute([$productId, $attributeId]);
        if($stmt -> rowCount() == 0){
            return false;
        }
        $conn = null;
    }
     public function deleteProductAttribute($productId){

        $sql = "call proc_productAttribute_delete( ?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);;
        $stmt->execute([$productId]);
        $conn = null;
    }


}