<?php

class  customer extends dbh
{

    function setCustomer($code, $name, $address, $phone)
    {
        $sql = "call proc_customer_insert(?,?,?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$code, $name,$phone ,$address ]);
        $conn = null;
    }

    function getCustomer()
    {
        $sql = "call proc_customer_selectAll()";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt ->fetchAll();
        return $data;
        $conn = null;
    }
      function getCustomerID($id)
    {
        $sql = "call proc_customer_selectID($id)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt ->fetchAll();
        return $data;
        $conn = null;
    }
    function editCustomer($code, $name, $address, $phone)
    {
        $sql = "call proc_customer_update(?,?,?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$code, $name,$address,$phone]);
        $conn = null;
    }


}