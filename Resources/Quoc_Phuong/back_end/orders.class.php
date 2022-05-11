<?php 
    class orders extends dbh
    {
        public $orderID;
        public $paymentID;
        public $transportID;
        public $statusOrder;

        public function __construct($orderID,$paymentID,$transportID,$statusOrder)
        {
            $this->orderID = $orderID;
            $this->paymentID = $paymentID;
            $this->transportID = $transportID;
            $this->statusOrder = $statusOrder;
        }

        public function setOrders()
        {
            $sql = "CALL proc_orders_insert(?,?,?,?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->orderID,$this->paymentID,$this->transportID,$this->statusOrder]);
            $count = $stmt->rowCount();
            if ($count = 0)
            {
                return false;
            }
            $conn = null;
        }

        public function getOrders()
        {
            $sql = "CALL proc_orders_selectID(?)";
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

        public function editOrders()
        {
            $sql = "CALL proc_orders_update(?,?,?,?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->orderID,$this->paymentID,$this->transportID,$this->statusOrder]);
            $count = $stmt->rowCount();
            if ($count = 0)
            {
                return false;
            }
            $conn = null;
        }
    }
