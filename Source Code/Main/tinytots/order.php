<?php session_start(); ?>
<?php
if (!isset($_SESSION['total'])) {
    header("location: index.php?page=product");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tinytots | All for your baby </title>
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

<?php include_once "./includes/header-website.php"; ?>
<section>
    <form method="post" action="#" class="border shadow-lg p-3 mb-5 bg-white rounded" style="padding-left: 20px;padding-right: 20px;width: 70%;display: block;margin: 0 auto;margin-top: 20px;">
        <h2 class="text-center" style="margin: 30px 0">
            <img src="./assets/img/logo.jpg" alt=""><span style="font-weight: bold">  Checkout </span></h2>
        <div class="row mb-3">
            <div class="col">
                <p style="color:black;"><strong>First Name&nbsp;</strong><span class="text-danger">*</span></p>
                <input type="text" class="form-control rounded-pill" placeholder="First name" name="fName" id="fName" aria-label="First name">
            </div>
            <div class="col">
                <p style="color:black;"><strong>Last Name&nbsp;</strong><span class="text-danger">*</span></p>
                <input type="text" class="form-control rounded-pill" placeholder="Last name" name="lName" id="lName" aria-label="Last name">
            </div>
        </div>
        <div class="mb-3">
            <p style="color:black;"><strong>Phone Number&nbsp;</strong><span class="text-danger">*</span></p>
            <input type="number" class="form-control rounded-pill" name="phone" id="phone" placeholder="Phone Number">
        </div>
        <div class="mb-3">
            <p style="color:black;"><strong>Address&nbsp;</strong><span class="text-danger">*</span></p>
            <input type="text" class="form-control rounded-pill" name="address" id="address" placeholder="Address">
        </div>
        <div class="mb-3">
            <p style="color:black;"><strong>Payment Method&nbsp;</strong><span class="text-danger">*</span></p>
            <select class="custom-select rounded-pill" aria-label=".form-select-sm example" id="showbank" name="payment" onchange="bankChaged(this)">
                <option selected>Open this select menu</option>
                <option>COD</option>
                <option value="Bank">Pay now</option>
            </select>
        </div>
        <div class="container py-5" id="bank" style="display: none;">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="bg-white rounded-lg shadow-sm p-5">
                        <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                            <li class="nav-item">
                                <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                                    <i class="fa fa-credit-card"></i>
                                    Credit Card
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
                                    <i class="fa fa-paypal"></i>
                                    Paypal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="pill" href="#nav-tab-bank" class="nav-link rounded-pill">
                                    <i class="fa fa-university"></i>
                                    Bank Transfer
                                </a>
                            </li>
                        </ul>

                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <div id="nav-tab-card" class="tab-pane fade show active">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="username">Full name (on the card)</label>
                                        <input type="text" name="username" placeholder="Nguyen Quoc Phuong" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="cardNumber">Card number</label>
                                        <div class="input-group">
                                            <input type="text" name="cardNumber" placeholder="Your card number" class="form-control" required>
                                            <div class="input-group-append">
														<span class="input-group-text text-muted">
															<i class="fa fa-cc-visa mx-1"></i>
															<i class="fa fa-cc-amex mx-1"></i>
															<i class="fa fa-cc-mastercard mx-1"></i>
														</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">Expiration</span></label>
                                                <div class="input-group">
                                                    <input type="number" placeholder="MM" name="" class="form-control" required>
                                                    <input type="number" placeholder="YY" name="" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4">
                                                <label data-toggle="tooltip" title="Three-digits code on the back of your card">CVV
                                                    <i class="fa fa-question-circle"></i>
                                                </label>
                                                <input type="text" required class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div id="nav-tab-paypal" class="tab-pane fade">
                                <p style="color:black;">Paypal is easiest way to pay online</p>
                                <p>
                                    <button type="button" class="btn btn-primary rounded-pill">
                                        <i class="fa fa-paypal mr-2"></i> Log into my Paypal
                                    </button>
                                </p>
                                <p class="text-muted">Login to Paypal account to continue using the service. </p>
                            </div>

                            <!-- bank transfer info -->
                            <div id="nav-tab-bank" class="tab-pane fade">
                                <h6>Bank account details</h6>
                                <dl>
                                    <dt>Bank</dt>
                                    <dd>ACB - Asia Commercial Bank</dd>
                                </dl>
                                <dl>
                                    <dt>Account number</dt>
                                    <dd>458097</dd>
                                </dl>
                                <dl>
                                    <dt>Account holder</dt>
                                    <dd>NGUYEN QUOC PHUONG</dd>
                                </dl>
                                <p class="text-muted">TinyTots only uses 1 bank account. Buyers need to check the
                                                      information carefully before transferring money.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto mb-3" style="margin-top:20px;">
            <button class="btn btn-success btn-lg btn-block rounded-pill" type="button" <?php if (isset($_SESSION['total'])): ?>onclick="order();" <?php endif; ?> >
                Purchase
            </button>
            <button class="btn btn-danger btn-lg btn-block rounded-pill" type="button" onclick="window.open('index.php?page=product', '_self')">
                Keep Buying
            </button>
        </div>
    </form>
</section>
<?php include "./includes/footer-website.php" ?>
<div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h7 class="modal-title" id="orderTitle"></h7>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="orderContent">

            </div>
            <div class="modal-footer">

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
