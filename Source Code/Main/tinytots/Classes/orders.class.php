<?php

class orders extends dbh
{


    public function setOrders($orderId,$customerCode)
    {
        $sql = "CALL proc_orders_insert(?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$orderId,$customerCode]);
        $conn = null;
    }

    public function getOrders($orderID)
    {
        $sql = "CALL proc_orders_selectID(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$orderID]);
        $data = $stmt->fetchAll();
        return $data;
        $conn = null;
    }
    public function getOrdersCustomer()
    {
        $sql = "CALL proc_ordersCustomer_selectAll()";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
        $conn = null;
    }


}
