<?php
class attribute extends dbh{
    public $attributeId;
    public $attributeName;
    public function __construct($attributeId,$attributeName)
    {
        $this->attributeId = $attributeId;
        $this ->attributeName = $attributeName;
    }
    public function setAttribute()
    {
        $sql = "call proc_attribute_insert( ?,?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute([$this->attributeId, $this -> attributeName]);
        if($stmt -> rowCount() == 0){
            return false;
        }
        $conn = null;
    }
    public function editAttribute(){
        $sql = "call proc_attribute_update( ?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);;
        $stmt->execute([$this->attributeId, $this -> attributeName]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }
     public function getAttributeId()
    {
        $sql = "call proc_attribute_selectID( ?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute([$this->attributeId]);
        $data = $stmt->fetchAll();
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
        $conn = null;

    }

}