<?php
session_start();
include_once "../autoloader/autoloaderClassesC2.php";

if (isset($_SESSION['total'])) {

    $lName = isset($_POST['lname']) ? trim($_POST['lname']) : "";
    $fName = isset($_POST['fname']) ? trim($_POST['fname']) : "";
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : "";
    $address = isset($_POST['address']) ? trim($_POST['address']) : "";
    $name = $lName . " " . $fName;
    $flag = true;
    $error = "";
    $cart = [];
    $validate = new validate();
    if ($validate->checkEmpty([$lName, $fName, $phone, $address])) {
        $flag = false;
        $error = '<strong>Oops!</strong> Please fill in all fields !!';
    } else
        if (!$validate->checkPhoneValid($phone)) {
            $flag = false;
            $error = '<strong>Oops!</strong> Phone number must be between 8 and 15 numbers !!';
        }


    if ($flag) {
        $objOrder = new orders();
        $objCus = new customer();
        $objOrderDetail = new orderdetail();

        $customerCode = getName::getName("CustomerCode", "customer");
        $orderId = getName::getName("OrderID", "orders");

        $objCus->setCustomer($customerCode, $name,  $address,$phone);
        $objOrder->setOrders($orderId, $customerCode);

        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }
        if (!empty($cart)) {
            foreach ($cart as $key => $value) {
                $objOrderDetail->setOrderDetail($orderId, $key, $value['number']);
            }

        }
        $lName = "";
        $fName = "";
        $phone = "";
        $address = "";
        unset($_SESSION['cart']);
        unset($_SESSION['total']);
        echo ' Thanks for ordering. Please keep an eye on your phone, we will confirm your order soon -- success ';

    }

    echo $error . "-- error ";
} else echo "Cart is empty, please return to the purchase page--emptycart";