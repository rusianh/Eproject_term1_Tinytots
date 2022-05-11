<?php session_start() ?>

<?php if(!isset($_SESSION['compare']) || count($_SESSION['compare']) < 2){
    header("location: ./index.php?page=product&error=compare");
} ?>

<?php include_once "./autoloader/autoloaderClasses.php" ?>
<?php
include_once "./includes/dataProcess.php";

$data = [];
$data = $_SESSION['compare'];
$product1 = $products->getProductId($data[0])[0];
$product2 = $products->getProductId($data[1])[0];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tinytots | Comparion
    </title>
    <link rel="shortcut icon" href="assets/img/logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Atomic+Age">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Animated-Pretty-Product-List-v12.css">
    <link rel="stylesheet" href="assets/css/footer-servitech.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/Navbar-with-menu-and-login.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>
<?php include "./includes/header-website.php"; ?>

<div class="container text-center py-3">

    <table class="table border" style="max-width: 80%; margin: auto;">
        <thead class="" style="background: #0FB59F; color: #FFFFFF">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Product</th>
            <th scope="col">Second Product</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Name</th>
            <td><?php echo $product1['Product_Name'] ?></td>
            <td><?php echo $product2['Product_Name'] ?></td>
        </tr>
        <tr>
            <th scope="row">Picture</th>
            <td><img style="width: 100px" src="<?php echo $product1['ProductImage_link'] ?>" alt=""></td>
            <td><img style="width: 100px" src="<?php echo $product2['ProductImage_link'] ?>" alt=""></td>
        </tr>
        <tr>
            <th scope="row">Price</th>
            <td><?php echo $product1['Product_Price'] ?></td>
            <td><?php echo $product2['Product_Price'] ?></td>
        </tr>
        <tr>
            <th scope="row">Brand</th>
            <td><?php echo $brandIdName[$product1['BrandID']] ?></td>
            <td><?php echo $brandIdName[$product2['BrandID']] ?></td>
        </tr>
        <tr>
            <th scope="row">Category</th>
            <td><?php echo $categoryIdName[$product1['CategoryID']] ?></td>
            <td><?php echo $categoryIdName[$product2['CategoryID']] ?></td>
        </tr>
        <tr>
            <th scope="row">Attribute</th>
            <td><?php
                foreach ($productAttribute[$product1['ProductID']] as $value) {
                    echo $value . "&nbsp;&nbsp;";
                }

                ?></td>
            <td><?php
                foreach ($productAttribute[$product2['ProductID']] as $value){
                echo $value . "&nbsp;&nbsp;";}
                ?></td>
        </tr>
        <tr>
            <th scope="row">
                <button class="btn btn-danger" onclick="window.open('./includes/deleteCompare.php','_self');"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Back
                </button>
            </th>
            <td>
                <button class="btn btn-success" style="background: #66ABE0; border: none" onclick="cart(<?php echo $product1['ProductID'] ?>);"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Add To Cart
                </button>
            </td>
            <td>
                <button class="btn btn-success" style="background: #66ABE0; border: none" onclick="cart(<?php echo $product2['ProductID'] ?>);"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Add To Cart
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<?php include "./includes/footer-website.php"; ?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="assets/js/Animated-Pretty-Product-List-v12.js"></script>
<script src="assets/js/app.js"></script>
</body>

</html>