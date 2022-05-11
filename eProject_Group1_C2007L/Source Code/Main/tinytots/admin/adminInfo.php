<?php require_once "../includes/checkSession.php" ?>
<?php include_once "../autoloader/autoloaderClassesC2.php"; ?>
<?php include_once "../includes/dataProcess.php"; ?>
<?php

$userName = $_SESSION['userName'];
$data = $admins->getAdmin($userName)[0];
$error = "";
$success = "";

if (isset($_GET['status']) && $_GET['status'] == "success") {
    $success = " <div class=\"alert alert-success\"  role=\"alert\"> Change password successfully !!</div>";
}


if (isset($_POST['submit'])) {
    $error = "";
    $success = "";
    $pwOld = isset($_POST['pwOld']) ? trim($_POST['pwOld']) : "";
    $pwNew = isset($_POST['pwNew']) ? trim($_POST['pwNew']) : "";
    $pwNewRepeat = isset($_POST['pwNewRepeat']) ? trim($_POST['pwNewRepeat']) : "";
    $validate = new validate();
    $flag = true;
    if ($validate->checkEmpty([$pwNew, $pwOld, $pwNewRepeat])) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Please fill in all fields !!</div>';
    } else if (!password_verify($pwOld, $data['Password'])) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Old password is not correct  !!</div>';
    } elseif ($pwNewRepeat != $pwNew) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> New password and new password confirm are not the same  !!</div>';
    } elseif (!$validate->CheckPwValid($pwNew)) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> New password must be at least 7 characters </div>';
    }

    if ($flag) {
        $admins->editAdmin($userName, $pwNew);
        header("location: admininfo.php?status=success");
    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Tinytots | Account info</title>
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

<div style="margin: 30px auto; width: 50%">
    <?php echo $error; ?>
    <?php echo $success; ?>

</div>
<div class="alert alert-info" role="alert" style="margin: 30px auto; width: 50%">
    <small>Hello <b><?php echo $_SESSION['userName']; ?></b></small> <br>
    <small>Last login is <b><?php echo date("  H:i:s, d-m-Y", $_COOKIE['lastlogin']); ?></b></small>
</div>

<h4 style="font-weight: bold; width: 50%; margin: 20px auto"><i class="fas fa-pen-nib"></i>&nbsp;&nbsp;INFO</h4>

<div class="list-group" style="width: 50%; margin: 30px auto">

    <a class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">

        </div>
        <p class="mb-1" style="text-align: left"><strong>ID :</strong>&nbsp;&nbsp;<?php echo $data['AdminID'] ?></p>

    </a>
    <a class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">

        </div>
        <p class="mb-1" style="text-align: left"><strong>USERNAME :</strong>&nbsp;&nbsp;<?php echo $data['UserName'] ?>
        </p>

    </a>
    <a class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">

        </div>
        <p class="mb-1" style="text-align: left"><strong>FULLNAME
                                                         :</strong>&nbsp;&nbsp;<?php echo $data['Name_Admin'] ?></p>

    </a>

</div>
<div class="product-form">

    <h4 style="font-weight: bold"><i class="fas fa-pen-nib"></i>&nbsp;&nbsp;CHANGE PASSWORD</h4>

    <form action="#" method="post">
        <div class="form-group">
            <label for="">Old password</label>
            <input type="password" class="form-control" id="" name="pwOld" value="" placeholder="">
        </div>
        <div class="form-group">
            <label for="">New password</label>
            <input type="password" class="form-control" id="" name="pwNew" value="" placeholder="">
        </div>
        <div class="form-group">
            <label for="">New password Comfirm </label>
            <input type="password" class="form-control" id="" name="pwNewRepeat" value="" placeholder="">
        </div>
        <button class="btn btn-primary" type="submit" name="submit" value="submit">SAVE</button>

</body>
</html>