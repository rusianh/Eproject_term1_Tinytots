<?php

class brand extends dbh
{
    public $brandID;
    public $brandName;
    public $brandAdress;

    function __construct($brandID, $brandName, $brandAdress)
    {

        $this->brandID = $brandID;
        $this->brandAdress = $brandAdress;
        $this->brandName = $brandName;

    }

    public function setBrand()
    {
        $sql = "call proc_brand_insert( ?,?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->brandID, $this->brandName, $this->brandAdress]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;

    }

    public function getBrandAll()
    {
        $sql = "call proc_brand_selectAll()";
        $conn = $this->connect();
        $stmt = $conn->execute($sql);
        $data = $stmt->fetchAll();
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
        $conn = null;
    }

    public function getBrandID()
    {
        $sql = "call proc_brand_select( ?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->brandID, $this->brandName]);
        $data = $stmt->fetchAll();
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
        $conn = null;

    }

    public function editBrand()
    {
        $sql = "call proc_brand_update( ?,?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->brandID, $this->brandName, $this->brandAdress]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;

    }
}