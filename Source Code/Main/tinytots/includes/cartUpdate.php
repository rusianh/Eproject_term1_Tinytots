<?php
session_start();
include_once "../autoloader/autoloaderClassesC2.php";

if (isset($_POST['id']) && isset($_POST['num'])) {
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        $id = $_POST['id'];
        if (array_key_exists($id, $cart)) {
            if ($_POST['num'] > 0) {
                $cart[$id] = array(
                    "name" => $cart[$id]['name'],
                    "image" => $cart[$id]["image"],
                    "categoryId" => $cart[$id]["categoryId"],
                    "brand" => $cart[$id]["BrandID"],
                    "price" => $cart[$id]["price"],
                    "number" => $_POST['num']
                );
            } else {
                unset($cart[$id]);

            }
            $total = 0;
            foreach ($cart as $value ){
                $total += $value['number'];
            }
            $_SESSION['total'] = $total;
            $_SESSION['cart'] = $cart;
        }
    }


}


?>