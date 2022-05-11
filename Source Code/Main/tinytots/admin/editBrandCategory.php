<?php require_once "../includes/checkSession.php" ?>
<?php include_once "../autoloader/autoloaderClassesC2.php"; ?>
<?php include_once "../includes/dataProcess.php"; ?>
<?php

// create error and success
$error = "";
$success = "";
$data = [];

// if ($_GET['brandid'] and $_GET['categoryid'] exist, create array $datas to contain data from Brand
if (isset($_GET['brandid']) && !isset($_GET['categoryid'])) {
    $brandId = $_GET['brandid'];
    $datas = $brands->getBrandID($brandId);
    if (array_key_exists(0, $datas)) {
        $data = $datas[0];
    } else header("location: ../error.php");
}
// if ($_GET['brandid'] & $_GET['categoryid'] not exist, move to error.php
if (!isset($_GET['brandid']) && isset($_GET['categoryid'])) {
    $categoryId = $_GET['categoryid'];
    $datas = $categories->getCategoryID($categoryId);
    if (array_key_exists(0, $datas)) {
        $data = $datas[0];
    } else header("location: error.php");
}

// if ($_GET['status']) and ($_GET['status'] = success) -> notice success message
if (isset($_GET['status'])) {
    if ($_GET['status'] == "success") {
        $success = " <div class=\"alert alert-success\"  role=\"alert\"> Edit successfully !!</div>";
    }
}
if (isset($_POST["submit1"])) {
    $success = "";
    $error = "";
    $brand = isset($_POST['brand']) ? trim($_POST['brand']) : "";

    $validate = new validate();
    $flag = true;

    // if brand name is empty, stop edit process and error warning
    if (empty($brand)) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Please fill in all fields !!</div>';
    }

    // if no error, update brand in database and send succsess message to url
    if ($flag) {

        $brands->editBrand($brandId, $brand);
        header("location: ./editBrandCategory.php?brandid=$brandId&status=success");
    }
}
if (isset($_POST["submit2"])) {
    $success = "";
    $error = "";
    $category = isset($_POST['category']) ? trim($_POST['category']) : "";
    $validate = new validate();
    $flag = true;

    // if category name is empty, stop edit process and error warning
    if (empty($category)) {
        $flag = false;
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Please fill in all fields !!</div>';
    }

    // if no error, update category in database and send succsess message to url
    if ($flag) {
        $categories->editCategory($categoryId, $category);
        header("location: ./editBrandCategory.php?category=$category&status=success");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tinytos | Edit brand and category</title>
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
    <?php echo $error; ?>
    <?php echo $success; ?>
    <?php if (isset($_GET['brandid']) && !isset($_GET['categoryid'])) : ?>
        <div class="product-form">

            <form action="#" method="post">
                <div class="form-group">
                    <label for="">Brand</label>
                    <input type="text" class="form-control" id="" name="brand" value="<?php echo $data['Brand_Name'] ?> " placeholder="">
                </div>
                <button type="submit" name="submit1" value="submit1" class="btn btn-primary">EDIT CATEGORY</button>
                <button type="button" class="btn btn-danger" onclick="window.open('listCategoryBrand.php','_self');">
                    BACK TO LIST CATEGORIES
                </button>
            </form>
        </div>
    <?php endif; ?>
    <?php if (!isset($_GET['brandid']) && isset($_GET['categoryid'])) : ?>
        <div class="product-form">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" class="form-control" id="" name="category" value="<?php echo $data['Name_Category'] ?>" placeholder="">
                </div>
                <button type="submit" name="submit2" value="submit2" class="btn btn-primary">EDIT BRAND</button>
                <button type="button" class="btn btn-danger" onclick="window.open('listCategoryBrand.php','_self');">
                    BACK TO LIST CATEGORIES
                </button>

            </form>
        </div>
    <?php endif; ?>
</div>
</body>
</html>


