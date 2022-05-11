<?php
session_start();
// if exist $_$_SESSION["userName"], moce to productList.php
if (isset($_SESSION["userName"])) {
    header("location: ./productList.php");
}
include_once "../autoloader/autoloaderClassesC2.php";

// create $error to contain all error in login process
$error = "";
if ((isset($_POST["submit"]))) {
//    $userName - contain username that user enter
    $userName = (isset($_POST['userName'])) ? trim($_POST['userName']) : " ";

    
//    $pw - contain password that user enter
    $pw = (isset($_POST['pw'])) ? trim($_POST['pw']) : " ";

    // create $validate to validate infomation
    $validate = new validate();

    // create boolean flag to allow login process 
    $flag = true;

    if ($validate->checkEmpty($_POST)) {
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong>Please fill in all fields !!</div>';
        $flag = false;
    } else if (!$validate->checkAdminLogin($userName, $pw)) {
        $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Incorrect username or password !!</div>';
        $flag = false;
    }
    if ($flag) {
        $_SESSION["userName"] = $userName;
        setcookie("name", $userName, time() + (86400 * 7));
        if (!isset($_COOKIE['lastlogin'])) {
            setcookie("lastlogin", time(), time() + (86400 * 7), "/");
        }
        header("location: ./productList.php");
    }

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tinytots | Login System</title>
    <link rel="shortcut icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Atomic+Age">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/Animated-Pretty-Product-List-v12.css">
    <link rel="stylesheet" href="../assets/css/Navbar-with-menu-and-login.css">
    <link rel="stylesheet" href="../assets/css/login.css">

</head>
<body>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <form method="post" action="./login.php">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row">&nbsp;</div>
                        <div class="row">&nbsp;</div>
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line"><img
                                    src="https://i.imgur.com/uNGdWHi.png" class="image"></div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row px-3"><label class="mb-1">
                                <h6 class="mb-0 text-sm">User Name</h6>
                            </label>
                            <input class="mb-4" type="text" name="userName" placeholder="Enter a valid user name">
                        </div>
                        <div class="row px-3"><label class="mb-1">
                                <h6 class="mb-0 text-sm">Password</h6>
                            </label>
                            <input type="password" name="pw" placeholder="Enter password"></div>
                        <div class="row px-3 mb-4">
                            <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                        </div>
                        <?php echo $error; ?>

                        <br>
                        <div class="row mb-3 px-3">
                            <button type="submit" name="submit" value="submit" class="btn btn-blue text-center">
                                Sign In
                            </button>
                        </div>

                        <div class="row mb-4 px-3"><small class="font-weight-bold">Don't have an account?
                                <a href="register.php"
                                   class="text-danger ">Register</a></small></div>
                    </div>
                </div>

            </div>
            <div class="bg-blue py-4">
                <div class="row px-3"><small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights
                                                                       reserved.</small>
                    <div class="social-contact ml-4 ml-sm-auto"><span class="fa fa-facebook mr-4 text-sm"></span>
                        <span
                                class="fa fa-google-plus mr-4 text-sm"></span> <span
                                class="fa fa-linkedin mr-4 text-sm"></span> <span
                                class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span></div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</body>
</html>