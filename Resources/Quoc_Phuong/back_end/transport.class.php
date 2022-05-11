<?php 
    class transort extends dbh
    {
        public $transportName;
        public $transportPhone;

        function __construct($transportName,$transportPhone)
        {
            $this->transportName = $transportName;
            $this->transportPhone = $transportPhone;
        }

        public function setTransport()
        {
            $sql = "CALL proc_transport_insert(?,?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->transportName,$this->transportPhone]);
            $count = $stmt->rowCount();
            if ($count = 0)
            {
                return false;
            }
            $conn = null;
        }

        public function getTransport()
        {
            $sql = "CALL proc_transport_selectName(?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->transportName]);
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

        public function editTransport()
        {
            $sql = "CALL proc_transport_update(?,?)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->transportName,$this->transportPhone]);
            $count = $stmt->rowCount();
            if ($count = 0)
            {
                return false;
            }
            $conn = null;
        }
    }