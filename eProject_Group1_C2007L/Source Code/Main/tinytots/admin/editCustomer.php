<?php require_once "../includes/checkSession.php" ?>
<?php include_once "../autoloader/autoloaderClassesC2.php"; ?>
<?php include_once "../includes/dataProcess.php";

// if ($_GET['code']  exist, create array $datas to contain data from customer table
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $datas = $customers->getCustomerID($code);
    if (array_key_exists(0, $datas)) {
        $data = $datas[0];
    } else header("location: error.php");
} else {
    header("location: customer.php");
}


$error = "";
$success = "";

if (isset($_GET['status']) && $_GET['status'] == 'success') {
    $success = " <div class=\"alert alert-success\"  role=\"alert\"> Edit customer info successfully !!</div>";
}

if (isset($_POST['submit'])) {
    $error = "";
    $success = "";
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $address = isset($_POST['address']) ? trim($_POST['address']) : "";
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : "";
    $validate = new validate();
    $flag = true;
    if ($validate->checkEmpty([$phone, $address, $name])) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Please fill in all fields !!</div>';
    } else if (!$validate->checkPhoneValid($phone)) {
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Phone number must be between 8 and 15 numbers !!</div>';
        $flag = false;
    }
    if ($flag) {
        $customers->editCustomer($code, $name, $address, $phone);
        header("location: editCustomer.php?code=" . $code . "&status=success");
    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Tinytots | Edit customer info</title>
    <link rel="shortcut icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/addProduct2.css">
</head>
<body>
<?php include_once "admin-menu.php" ?>
<div class="product-form">
    <?php echo $error; ?>
    <?php echo $success; ?>
    <h2 style="font-weight: bold"><i class="fas fa-pen-nib"></i>&nbsp;&nbsp;EDIT CUSTOMER INFO</h2>
    <?php if (!empty($data)) : ?>
    <form action="#" method="post">
        <div class="form-group">
            <label for="">Customer name</label>
            <input type="text" class="form-control" id="" name="name" value="<?php echo $data['Order_Name'] ?>" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Customer address</label>
            <input type="text" class="form-control" id="" name="address" value="<?php echo $data['Order_Address'] ?>" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Customer phone</label>
            <input type="number" class="form-control" id="" name="phone" value="<?php echo $data['Order_Phone'] ?>" placeholder="">
        </div>
        <button class="btn btn-primary" type="submit" name="submit" value="submit">SAVE</button>
        <button class="btn btn-danger" type="button" onclick="window.open('customer.php','_self')">LIST CUSTOMERS
        </button>
        <?php endif; ?>
    </form>
</body>
</html>