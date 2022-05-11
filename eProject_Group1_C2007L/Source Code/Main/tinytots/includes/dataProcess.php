<?php

// information processing

// create objects by classes ( in classes directory)
$categories = new category();
$brands = new brand();
$products = new product();
$customers = new customer();
$orders = new orders();
$orderDetails = new orderdetail();;
$admins = new admin();
$productAttributes = new productAttribute();
$attribute = new attribute();


// create array to contain data from category table
$dataCategory = $categories->getCategoryAll();

// create assoc array (Name_Category -> CategoryID )
$categoryNameId = [];

// create assoc array (CategoryID -> Name_Category )
$categoryIdName = [];
if (!empty($dataCategory)) {
    foreach ($dataCategory as $value) {
        $categoryNameId[$value["Name_Category"]] = $value['CategoryID'];
    }
    foreach ($dataCategory as $value) {
        $categoryIdName[$value['CategoryID']] = $value["Name_Category"];
    }
}

// create array to contain data from brand table
$dataBrand = $brands->getBrandAll();

// create assoc array (Brand_Name -> BrandID )
$brandNameId = [];

// create assoc array (BrandID -> Brand_Name )
$brandIdName = [];
if (!empty($dataBrand)) {
    foreach ($dataBrand as $value) {
        $brandNameId[$value["Brand_Name"]] = $value['BrandID'];
    }
    foreach ($dataBrand as $value) {
        $brandIdName[$value['BrandID']] = $value["Brand_Name"];
    }
}

// create array to contain all data from product table
$dataProduct = $products->getProductAll();

// create 2 dimensional array, this array have productId is key and Attribute_Name is value (is contained by array)
$productAttribute = [];

// create 2 dimensional array, this array have productId is key and AttributeID is value (is contained by array)
$productAttributeID = [];
if (!empty($products->getProductAllAttribute())) {
    foreach ($products->getProductAllAttribute() as $value) {
        $productAttribute[$value['ProductID']][] = $value['Attribute_Name'];
        $productAttributeID[$value['ProductID']][] = $value['AttributeID'];
    }
}

// create array to contain all data from orders table
$dataOrder = $orders ->getOrdersCustomer();
// create array to contain all data from customers table
$dataCustomer = $customers -> getCustomer();


?>








