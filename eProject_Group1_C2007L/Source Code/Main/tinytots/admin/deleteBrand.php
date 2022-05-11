<?php require_once "../includes/checkSession.php" ?>
<?php include_once "../autoloader/autoloaderClassesC2.php"; ?>
<?php include_once "../includes/dataProcess.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $brands -> deleteBrand($id);
}
header("location: ./listCategoryBrand.php");

