<?php

class configution extends dbh
{
    public $conId;
    public $systemKey;
    public $systemValue;

    public function __construct($conId,$systemKey,$systemValue)
    {
        $this->conId = $conId;
        $this->systemKey = $systemKey;
        $this->systemValue = $systemValue;
    }

    public function setConfigution()
    {
        $sql = "call proc_configution_insert(?, ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->systemKey,$this->systemValue]);
        if($stmt->rowCount() == 0)
        {
            return false;
        }
        $conn = null;
    }

    public function getConfigution()
    {
        $sql = "call proc_configution_selectKey(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->systemKey]);
        $data = $stmt->fetchAll();
        if(count($data) > 0)
        {
            return $data;
        } else {
            return false;
        }
        $conn = null;
    }

    public function editConfigution()
    {
        $sql = "call proc_configution_update(?, ?, ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->conId,$this->systemKey, $this->systemValue]);
        if($stmt->rowCount() == 0)
        {
            return false;
        }
        $conn = null;
    }
}