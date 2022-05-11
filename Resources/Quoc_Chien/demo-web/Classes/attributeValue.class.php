<?php
class attributeValue extends dbh{
    public $attributeValue;
    public $attributeId;
    public function __construct($attributeId, $attributeValue)
    {
        $this -> attributeValue = $attributeValue ;
        $this -> attributeId = $attributeId;
    }
    public function setAttributeValue()
    {
        $sql = "call proc_attributeValue_insert( ?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute([$this->attributeValue, $this -> attributeId]);
        if($stmt -> rowCount() == 0){
            return false;
        }
        $conn = null;
    }
    public function getAttributeValue(){
        $sql = "call proc_attributeValue_selectAtbID(?)";
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
