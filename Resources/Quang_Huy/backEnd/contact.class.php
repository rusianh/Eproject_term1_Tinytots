<?php

class contact extends dbh
{
    private $typeContact;
    private $contactName;
    private $contactPhone;
    private $contactEmail;

    public function __construct($typeContact, $contactName, $contactPhone, $contactEmail)
    {
        $this->typeContact = $typeContact;
        $this->contactName = $contactName;
        $this->contactPhone = $contactPhone;
        $this->contactEmail = $contactEmail;
    }

    public function setContact()
    {
        $sql = "call proc_contact_insert(?, ?, ?, ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->typeContact, $this->contactName, $this->contactPhone, $this->contactEmail]);
        if($stmt->rowCount() == 0)
        {
            return false;
        }
        $conn = null;
    }

    public function getContact()
    {
        $sql = "call proc_contact_selectType(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->typeContact]);
        $data = $stmt->fetchAll();
        if(count($data) > 0)
        {
            return $data;
        } else {
            return false;
        }
        $conn = null;
    }

    public function editContact()
    {
        $sql = "call proc_contact_update(?,?,?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->typeContact, $this->contactName, $this->contactPhone, $this->contactEmail]);
        if($stmt->rowCount() == 0)
        {
            return false;
        }
        $conn = null;
    }
}