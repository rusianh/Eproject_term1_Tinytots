<?php require_once "../includes/checkSession.php" ?>
<?php include_once "../autoloader/autoloaderClassesC2.php"; ?>
<?php include_once "../includes/dataProcess.php";


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tinytots | List Products</title>
    <link rel="shortcut icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Atomic+Age">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/Animated-Pretty-Product-List-v12.css">
    <link rel="stylesheet" href="../assets/css/footer-servitech.css">
    <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="../assets/css/Navbar-with-menu-and-login.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/admin.css ">
</head>
<body>
<?php include "admin-menu.php" ?>
<div id="container">
    <h4><i class="far fa-list-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;LIST PRODUCTS</h4>
    <div class="table" id="table">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ProductID</th>
                <th scope="col">Productname</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Description</th>
                <th scope="col">Attribute</th>
                <th scope="col">Brand</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col" >Action</th>

            </tr>
            </thead>
            <tbody>
            <?php if (!empty($dataProduct)) : ?>
                <?php foreach ($dataProduct as $data) : ?>

                    <tr>
                        <th scope="row"><?php echo $data['ProductID']; ?></th>
                        <td><?php echo $data['Product_Name']; ?></td>
                        <td><?php echo $data['Product_Price']; ?></td>
                        <td><?php echo $data['Product_status']; ?></td>
                        <td><?php echo $data['Description_Product']; ?></td>
                        <td><span>
                            <?php foreach ($productAttribute[$data['ProductID']] as $data1) : ?>
                            <?php echo $data1; ?>
                            <?php endforeach; ?>
                                </span>
                        </td>
                        <td><?php echo $brandIdName[$data['BrandID']]; ?></td>
                        <td><?php echo $categoryIdName[$data['CategoryID']]; ?></td>
                        <td><img style="width: 50px; height: 50px" src="../<?php echo $data['ProductImage_link']; ?>" alt=""></td>
                        <td>
                            <a href="productAddEdit.php?page=edit&id=<?php echo $data['ProductID']; ?>" target="_self">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

            </tbody>
        </table>
             <button style="font-weight: bold; width: 30%; display: block; margin: 10px auto" type="button" onclick="window.open('productAddEdit.php?page=add','_self');"  class="btn btn-primary">ADD PRODUCTS</button>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>