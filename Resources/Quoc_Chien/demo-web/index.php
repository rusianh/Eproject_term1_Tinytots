<?php
include "./includes/autoloaderClasses.inc.php";
include "./includes/autoloaderFunction.inc.php";





//    $a = new uploadFile();
//
//    $hinh = $a -> UploadFile("Upload", "upload/", 1, 4,"submit")  ;
//    $ten = json_decode($hinh);
//    if($ten -> kq){
//        $imageLink = $ten -> file;
//    }
//    $b = new images(getName::getName("ImageId","images","IMG"),$imageLink,"PRO12345");
//    $b ->setImage();
$a = new dbh();
$pdo = $a->connect();
//    $sql = "select a.ProductID, a.Product_Name, a.BrandID, b.Image_Link from product a, images b where a.ProductID = b.ProductID";
$sql = "select ProductID, Product_Name, BrandID from product";


$stmt = $pdo->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($data);
echo "<pre>";
$image=[];



echo "<pre>";
print_r($image);
echo "<pre>";


$image = [];





echo "<pre>";
print_r($image);
echo "<pre>";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="#">
    <input type="file" name="Upload">
    <input type="submit" name="submit" value="submit">

    <?php


    ?>


</form>


</body>
</html>
