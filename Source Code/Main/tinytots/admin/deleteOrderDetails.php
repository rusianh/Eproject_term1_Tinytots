<?php require_once "../includes/checkSession.php" ?>
<?php include_once "../autoloader/autoloaderClassesC2.php"; ?>
<?php include_once "../includes/dataProcess.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $orderDetails -> getOrderDetail_OrderDetailID($id)[0];
    $orderDetails->deleteOrderDetailId($id );
}

header("location: ./orderDetails.php?id=".$data['OrderID']);
