<?php session_start() ;?>
<?php include_once "../autoloader/autoloaderClassesC2.php" ?>

<?php

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $objProduct = new product();
    $datas = $objProduct->getProductId($id);
    if (!isset($_SESSION["cart"])) {
        $cart[$id] = array(
            "name" => $datas[0]["Product_Name"],
            "image" => $datas[0]["ProductImage_link"],
            "brand" => $datas[0]["BrandID"],
            "categoryId" => $datas[0]["CategoryID"],
            "price" => $datas[0]["Product_Price"],
            "number" => 1
        );
    } else {
        $cart = $_SESSION['cart'];
        if (array_key_exists($id, $cart)) {
            $cart[$id] = array(
                "name" => $datas[0]["Product_Name"],
                "image" => $datas[0]["ProductImage_link"],
                "brand" => $datas[0]["BrandID"],
                "categoryId" => $datas[0]["CategoryID"],
                "price" => $datas[0]["Product_Price"],
                "number" => (int)$cart[$id]["number"] + 1
            );
        } else {
            $cart[$id] = array(
                "name" => $datas[0]["Product_Name"],
                "image" => $datas[0]["ProductImage_link"],
                "brand" => $datas[0]["BrandID"],
                "categoryId" => $datas[0]["CategoryID"],
                "price" => $datas[0]["Product_Price"],
                "number" => 1
            );
        }


    }
    $_SESSION['cart'] = $cart;
    $number = 0;
    foreach ($cart as $value) {
        $number += (int)$value['number'];
    }
    $_SESSION['total'] = $number;
}
?>