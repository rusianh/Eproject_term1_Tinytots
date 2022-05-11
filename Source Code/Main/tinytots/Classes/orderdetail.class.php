<?php 
    class orderdetail extends dbh
    {
        /*public $orderDetailID;
        public $orderID;
        public $productID;
        public $quantity;

        public function __construct($orderDetailID,$orderID,$productID,$quantity)
        {
            $this->orderDetailID = $orderDetailID;
            $this->orderID = $orderID;
            $this->productID = $productID;
            $this->quantity = $quantity;
        }*/

        public function setOrderDetail($orderID,$productID,$quantity)
        {
            $sql = "CALL proc_orderdetail_insert(?,?,?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$orderID,$productID,$quantity]);
            $conn = null;
        }


        public function getOrderDetail_OrderID($orderId)
        {
            $sql = "CALL proc_orderdetail_selecOrderID(?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$orderId]);
            $data = $stmt->fetchAll();
            return $data;
            $conn = null;
        }

         public function getOrderDetail_OrderDetailID($Id)
        {
            $sql = "CALL proc_orderdetail_selecOrderDetailID(?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$Id]);
            $data = $stmt->fetchAll();
            return $data;
            $conn = null;
        }
        public function deleteOrderDetailId($id){
            $sql = "CALL proc_orderdetail_delete(?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $conn = null;
        }

        public function editOrderDetail_Product($orderDetail, $productId,$quantity)
        {
            $sql = "CALL proc_orderdetail_updateProduct(?,?,?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$orderDetail, $productId,$quantity]);
            $conn = null;
        }
    }