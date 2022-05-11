<?php 
    class payment extends dbh{
        public $paymentID;
        public $paymentName;

        function __construct($paymentID,$paymentName)
        {
            $this->paymentID = $paymentID;
            $this->paymentName = $paymentName;
        }

        public function setPayment()
        {
            $sql = "CALL proc_payment_insert(?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->paymentName]);
            $count = $stmt->rowCount();
            if ($count = 0)
            {
                return false;
            }
            $conn = null;
        }

        public function getPayment()
        {
            $sql = "CALL proc_payment_selectAll()";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->paymentName]);
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

        public function editPayment()
        {
            $sql = "CALL proc_payment_update(?,?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->paymentID,$this->paymentName]);
            $count = $stmt->rowCount();
            if ($count = 0)
            {
                return false;
            }
            $conn = null;
        }
    }