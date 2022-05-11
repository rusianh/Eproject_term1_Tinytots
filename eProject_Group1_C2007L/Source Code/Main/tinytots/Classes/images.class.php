<?php

class images extends dbh
{


   /* public $imageLink;
    public $productId;

    function __construct( $imageLink, $productId)
    {


        $this->imageLink = $imageLink;
        $this->productId = $productId;
    }*/

    public function setImage($imageLink, $productId)
    {
        $sql = "call proc_image_insert( ?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([ $imageLink, $productId]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }

    public function getImageLink($productId)
    {

        $sql = "call proc_image_selectImageLink( ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);;
        $stmt->execute([$productId]);
        $data = $stmt->fetchAll();
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
        $conn = null;

    }

    public function editImage($imageId, $imageLink)
    {
        $sql = "call proc_image_update( ?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);;
        $stmt->execute([$imageId, $imageLink]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;
    }







}