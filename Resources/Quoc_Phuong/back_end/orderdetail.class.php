<?php 
    class orderdetail extends dbh
    {
        public $orderDetailID;
        public $orderID;
        public $orderName;
        public $orderPhone;
        public $orderAddress;
        public $productID;
        public $quantity;

        public function __construct($orderDetailID,$orderID,$orderName,$orderPhone,$orderAddress,$productID,$quantity)
        {
            $this->orderDetailID = $orderDetailID;
            $this->orderID = $orderID;
            $this->orderName = $orderName;
            $this->orderPhone = $orderPhone;
            $this->orderAddress = $orderAddress;
            $this->productID = $productID;
            $this->quantity = $quantity;
        }

        public function setOrderDetail()
        {
            $sql = "CALL proc_orderdetail_insert(?,?,?,?,?,?,?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->orderDetailID,$this->orderID,$this->orderName,$this->orderPhone,$this->orderAddress,$this->productID,$this->quantity]);
            $count = $stmt->rowCount();
            if ($count = 0)
            {
                return false;
            }
            $conn = null;
        }

        public function getOrderDetail_OrderDetailID()
        {
            $sql = "CALL proc_orderdetail_selectDetailID(?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->orderDetailID]);
            $data = $stmt->fetchAll();
            if (count($data) > 0)
            {
                return $data;
            }
            else
            {
                return false;
            }
            $conn = null;
        }

        public function getOrderDetail_OrderID()
        {
            $sql = "CALL proc_orderdetail_selectOrderID(?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->orderID]);
            $data = $stmt->fetchAll();
            if (count($data) > 0)
            {
                return $data;
            }
            else
            {
                return false;
            }
            $conn = null;
        }

        public function editOrderDetail()
        {
            $sql = "CALL proc_orderdetail_update(?,?,?,?,?,?,?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->orderDetailID,$this->orderID,$this->orderName,$this->orderPhone,$this->orderAddress,$this->productID,$this->quantity]);
            $count = $stmt->rowCount();
            if ($count = 0)
            {
                return false;
            }
            $conn = null;
        }
    }