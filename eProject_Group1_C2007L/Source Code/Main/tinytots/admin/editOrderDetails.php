<?php require_once "../includes/checkSession.php" ?>
<?php include_once "../autoloader/autoloaderClassesC2.php"; ?>
<?php include_once "../includes/dataProcess.php";

$error = "";
$success = "";
$data = [];


if (isset($_GET['id'])) {
    $orderDetailsId = $_GET['id'];
    $datas = $orderDetails->getOrderDetail_OrderDetailID($orderDetailsId);
    if (array_key_exists(0, $datas)) {
        $data = $datas[0];
    } else header("location: ../error.php");

} else {
    header("location: ./orderDetails.php");
}
if (isset($_GET['status']) && $_GET['status'] == "success") {
    $success = " <div class=\"alert alert-success\"  role=\"alert\"> edit successfully !!</div>";
}


if (isset($_POST['submit'])) {
    $error = "";
    $success = "";

    $productId = isset($_POST['productId']) ? trim($_POST['productId']) : "";
    $quantity = isset($_POST['quantity']) ? trim($_POST['quantity']) : "";
    $validate = new validate();
    $dataId = $products->getAllProductID();

    $flag = true;

    if ($validate->checkEmpty([$productId, $quantity])) {
        $flag = false;
        $error = '<div class="alert alert-danger" style="text-align: center"> <strong>Oops!</strong> Please fill in all fields !!</div>';
    } else {
        if (!in_array($productId, $dataId)) {
            $flag = false;
            $error = '<div class="alert alert-danger"> <strong>Oops!</strong> ProductID do not exist <br>
            Please !! see <a href="productList.php">list products </a></div>';
        }
        if (!is_numeric($quantity)) {
            $flag = false;
            $error = '<div class="alert alert-danger" > <strong>Oops!</strong> Quantity must be number !!</div>';
        } else
            if ((int)$quantity < 0) {
                $flag = false;
                $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Quantity must be bigger than 0!!</div>';
            }
    }
    if ($flag) {
        $quantity = (int)$quantity;
        $orderDetails->editOrderDetail_Product($orderDetailsId, $productId, $quantity);
        header("location: ./editOrderDetails.php?id=$orderDetailsId&status=success");
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Tinytots | Edit Order details </title>
    <link rel="shortcut icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/addProduct2.css">
</head>
<body>
<?php include_once "admin-menu.php"; ?>

<?php if (!empty($data)): ?>
<div class="product-form">
    <?php echo $error; ?>
    <?php echo $success; ?>
    <h2><i class="far fa-edit"></i>&nbsp;&nbsp;EDIT ORDER DETAILS <strong><?php echo $data['OrderDetailID'] ?></strong>
    </h2>
    <form action="#" method="post">
        <?php if (!empty($data)): ?>
            <div class="form-group">
                <label for=""><strong>ProductID</strong></label>
                <input type="text" class="form-control" id="" value="<?php echo $data['ProductID']; ?>" name="productId" placeholder="">

            </div>
            <div class="form-group">
                <label for=""><strong>Quantity</strong></label>
                <input type="text" class="form-control" id="" name="quantity" value="<?php echo $data['Quantity'] ?>" placeholder="">
            </div>
        <?php endif; ?>
        <button type="submit" name="submit" value="submit" class="btn btn-primary" style="width: 25%;margin: 0 auto; display: block ">
            SAVE
        </button>
        <a href="orderDetails.php?id=<?php echo $data['OrderID'] ?>">
            <button type="button" class="btn btn-danger" style="width: 25%;margin: 0 auto; display: block; margin-top: 20px ">
                ORDER DETAILS
            </button>
        </a>

    </form>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
