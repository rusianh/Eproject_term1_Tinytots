<?php

class product extends dbh
{

    public function setProduct($productId, $productName, $productDescription, $productStatus, $brandId, $categoryId, $productImageLink, $productPrice)
    {
        $sql = "call proc_product_insert( ?,?,?,?,?,?,?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$productId, $productName,
            $categoryId, $brandId,
            $productStatus, $productDescription,
            $productPrice, $productImageLink]);
        return false;
        $conn = null;
    }

    public function getProductAll()
    {
        $sql = "call proc_product_selectAll()";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
        $conn = null;

    }

    public function getProductId($productId)
    {
        $sql = "call proc_product_selectAll_productId(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$productId]);
        $data = $stmt->fetchAll();
        return $data;
        $conn = null;

    }

    public function getProductName($productName)
    {
        $sql = "call proc_product_selectName(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$productName]);
        $data = $stmt->fetchAll();
        return $data;
        $conn = null;

    }

    public function getAllProductID()
    {
        $sql = "call proc_product_selectID()";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row['ProductID'];
        }
        return $data;
        $conn = null;

    }


    public function getProductAllBrand($brandId)
    {
        $this->brandId = $brandId;
        $sql = "call proc_product_selectAll_Brand(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$brandId]);
        $data = $stmt->fetchAll();
        return $data;
        $conn = null;
    }

    public function getProductAllCategory($categoryId)
    {

        $sql = "call proc_product_selectAll_Category(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$categoryId]);
        $data = $stmt->fetchAll();
        return $data;
        $conn = null;
    }

    public function getProductAllAttribute()
    {

        $sql = "call proc_product_selectAll_Attribute()";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
        $conn = null;
    }

    public function getProductAttributeID($productId)
    {

        $sql = "call proc_product_selectProductID_Attribute(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$productId]);
        $data = $stmt->fetchAll();
        return $data;
        $conn = null;
    }

    public function editProductImage($productId, $link)
    {
        $sql = "call proc_product_updateImage(?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$productId, $link]);
        $conn = null;

    }

    public function editProduct($id, $name, $categoryId, $description, $status, $brandId, $link, $price)
    {

        $sql = "call proc_product_edit(?,?,?,?,?,?,?,?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id, $name, $categoryId, $description, $status, $brandId, $link, $price]);
        $conn = null;
    }

    public function deleteProduct($id)
    {
        $sql = "call proc_product_delete(?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $conn = null;
    }


}