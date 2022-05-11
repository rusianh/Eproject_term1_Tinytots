<?php require_once "../includes/checkSession.php" ?>
<?php include_once "../autoloader/autoloaderClassesC2.php"; ?>
<?php include_once "../includes/dataProcess.php"; ?>
<?php

// create $error to error warning
$error = "";
// create $success to note  success
$success = "";
if (isset($_GET['status'])) {
    if ($_GET['status'] == "success") {
        $success = " <div class=\"alert alert-success\"  role=\"alert\"> Add successfully !!</div>";
    }
}
if (isset($_POST["submit1"])) {
    $success = "";
    $error = "";
    $brand = isset($_POST['brand']) ? trim($_POST['brand']) : "";

    $validate = new validate();
    $flag = true;

    // if brandname is empty -> stop login and error warning
    if (empty($brand)) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Please fill in all fields !!</div>';
    }

    // if brandname exist -> stop login and error warning
    if (!$validate->CheckBrandName($brand)) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Brand already exists </div>';
    }

    // if no error, insert new brand to database;
    if ($flag) {
        $objBrand = new brand();
        $objBrand->setBrand($brand);
        header("location: ./addCategoryBrand.php?status=success");
    }
}
if (isset($_POST["submit2"])) {
    $success = "";
    $error = "";
    $category = isset($_POST['category']) ? trim($_POST['category']) : "";
    $validate = new validate();
    $flag = true;

    // if category name is empty , stop login and error warning
    if (empty($category)) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Please fill in all fields !!</div>';
    }

    // if category name exist , stop login and error warning
    if (!$validate->CheckCategoryName($category)) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Category already exists </div>';
    }

    // if no error, insert new category to database;
    if ($flag) {
        $objCategory = new category();
        $objCategory->setCategory($category);
        header("location: ./addCategoryBrand.php?status=success");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tinytos | Add brand and category</title>
    <link rel="shortcut icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/addCategoryBrand.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
<?php include "admin-menu.php"; ?>
<div id="main">

    <div class="product-form">
        <?php echo $error; ?>
        <?php echo $success; ?>
        <form action="#" method="post">
            <div class="form-group">
                <label for="">Brand</label>
                <input type="text" class="form-control" id="" name="brand" placeholder="">
            </div>
            <button type="submit" name="submit1" value="submit1" class="btn btn-primary">ADD BRAND</button>

        </form>


        <div class="product-form" style="width: 100%">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" class="form-control" id="" name="category" placeholder="">
                </div>
                <button type="submit" name="submit2" value="submit2" class="btn btn-primary">ADD CATEGORY</button>

            </form>
        </div>
          <div style="width: 100%"><button class="btn btn-primary" style="font-weight: bolder;width: 40%; display: block; margin: 0 auto" onclick="window.open('listCategoryBrand.php','_self')">LIST BRANDS AND CATEGORIES</button></div>
    </div>
</body>
</html>