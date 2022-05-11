<?php

class brand extends dbh
{
   /* public $brandID;
    public $brandName;
    public $brandAdress;

    function __construct($brandID, $brandName, $brandAdress)
    {

        $this->brandID = $brandID;
        $this->brandAdress = $brandAdress;
        $this->brandName = $brandName;

    }*/

    public function setBrand($brandName)
    {
        $sql = "call proc_brand_insert(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$brandName]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;

    }

    public function getBrandName($brandName)
    {
        $sql = "call proc_brand_selectName( ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$brandName]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;

    }
     public function getBrandID($brandId)
    {
        $sql = "call proc_brand_selectId( ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$brandId]);
        $data = $stmt ->fetchAll();
        return $data;
        $conn = null;

    }


    public function getBrandAll()
    {
        $sql = "call proc_brand_selectAll()";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
        $conn = null;
    }
     public function deleteBrand($brandID)
    {
        $sql = "call proc_brand_delete( ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$brandID]);
        $conn = null;

    }


    public function editBrand($brandID, $brandName)
    {
        $sql = "call proc_brand_update( ?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$brandID, $brandName]);
        $conn = null;

    }
}