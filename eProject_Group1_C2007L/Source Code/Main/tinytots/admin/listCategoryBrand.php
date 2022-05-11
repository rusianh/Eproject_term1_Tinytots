<?php require_once "../includes/checkSession.php" ?>
<?php include_once "../autoloader/autoloaderClassesC2.php"; ?>
<?php include_once "../includes/dataProcess.php"; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TinyTots | List Brands && Categories </title>
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
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/lisBrandCategory.css">
</head>
<body>
<?php include "admin-menu.php" ?>
<div id="container">
    <h4><i class="far fa-list-alt"></i>&nbsp;&nbsp;LIST CATEGORIES && BRANDS</h4>
    <div class="table" id="table" style="width: 40%; margin-left: 15%; margin-top: 10%">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">BrandID</th>
                <th scope="col">Brand name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($dataBrand)): ?>
                <?php foreach ($dataBrand as $data) : ?>
                    <tr>
                        <th scope="row"><?php echo $data['BrandID']; ?></th>
                        <td><?php echo $data['Brand_Name']; ?></td>
                        <td>
                            <a href="../admin/editBrandCategory.php?brandid=<?php echo $data['BrandID']; ?> " target="_blank">Edit</a>

                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>

        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">CategoryID</th>
                <th scope="col">Caterygory name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($dataCategory)) :?>
                <?php foreach ($dataCategory as $data) : ?>
                    <tr>
                        <th scope="row"><?php echo $data['CategoryID']; ?></th>
                        <td><?php echo $data['Name_Category']; ?></td>
                        <td>
                            <a href="../admin/editBrandCategory.php?categoryid=<?php echo $data['CategoryID'] ?>" target="_blank">Edit</a>

                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
        <div style="width: 100%"><button class="btn btn-primary" style="font-weight: bolder;width: 40%; display: block; margin: 0 auto" onclick="window.open('addCategoryBrand.php','_blank')">ADD BRANDS OR CATEGORIES</button></div>

    </div>

</div>
<br>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

