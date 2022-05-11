<?php

class store extends dbh
{
    public $storeId;
    public $storeName;
    public $storePhone;
    public $storeAddress;

    function __construct($storeId, $storeName, $storePhone, $storeAddress)
    {
        $this->storeId = $storeId;
        $this->storeName = $storeName;
        $this->storePhone = $storePhone;
        $this->storeAddress = $storeAddress;
    }

    public function setStore()
    {
        $sql = "call proc_store_insert(?, ?, ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->storeName, $this->storePhone, $this->storeAddress]);
        if ($stmt->rowCount() == 0) {
            return false;
        }
        $conn = null;
    }

    public function editStore()
    {
        $sql = "call proc_store_update(?, ?, ?, ?)";
        $conn = $this->connect;
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->storeId, $this->storeName, $this->storePhone, $this->storeAddress]);
        if ($stmt->rowCount() == 0) {
            return false;
        }
        $conn = null;
    }

    public function getStore()
    {
        $sql = "call proc_store_selectName(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->storeName]);
        $data = $stmt->fetchAll();
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
        $conn = null;
    }
}

?>
