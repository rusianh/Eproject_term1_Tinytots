<?php session_start(); ?>
<?php include_once "./autoloader/autoloaderClasses.php"; ?>
<?php include_once "./includes/dataProcess.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tinytots | All For Your Baby </title>
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
    <link rel="stylesheet" href="assets/css/News-Cards.css">
    <link rel="stylesheet" href="assets/css/-product-features.css">
    <link rel="stylesheet" href="assets/css/Features-Blue.css">
    <link rel="stylesheet" href="assets/css/Map-Clean.css">
    <link rel="stylesheet" href="assets/css/footer-servitech.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 300px;
            width: 100%;
        }
    </style>
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {lat: 21, lng: 105},
                zoom: 8,
            });
        }
    </script>
</head>

<body>



<!-- import header website -->
<?php include_once "./includes/header-website.php"; ?>



<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : "";


switch ($page) {
    case "product":
        include_once "product.php";
        break;
    case "brand":
        include_once "brands.php";
        break;
    case "new":
        include_once "news.php";
        break;
    case "store":
        include_once "stores.php";
        break;
    case "franchise":
        include_once "brandchild.php";
        break;
    case "resource":
        include_once "resource.php";
        break;
    case "cart":
        include_once "shoppingcart.php";
        break;
    default:
        include_once "website.php";
        break;
}


?>




<!-- import footer website -->
<?php include "./includes/footer-website.php" ?>

<div class="modal fade" id="compare" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="" style="color: #000303; font-weight: bold; font-size: 18px">Notice</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="addCompare" style="">
            </div>
            <div class="modal-footer" id="buttonCompare">
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="assets/js/Animated-Pretty-Product-List-v12.js"></script>
<script src="assets/js/app.js"></script>
</body>

</html>