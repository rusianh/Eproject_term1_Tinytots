<?php

class images extends dbh
{

    public $imageName;
    public $imageLink;
    public $productId;

    function __construct($imageName, $imageLink, $productId)
    {

        $this->imageName = $imageName;
        $this->imageLink = $imageLink;
        $this->productId = $productId;
    }

    public function setImage()
    {
        $sql = "call proc_image_insert( ?,?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->imageName, $this->imageLink, $this->productId]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }

    public function getImageLink()
    {

        $sql = "call proc_image_selectImageLink( ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);;
        $stmt->execute([$this->productId]);
        $data = $stmt->fetchAll();
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
        $conn = null;

    }

    public function editImage()
    {
        $sql = "call proc_image_update( ?,?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);;
        $stmt->execute([$this->imageName, $this->imageLink, $this->productId]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }







}