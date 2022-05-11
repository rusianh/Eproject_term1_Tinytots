<header class="" id="km-header">
    <nav class="navbar navbar-expand-lg p-0">
        <div class="km-navbar-brand text-lg-center">
            <div class="container">
                <button aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarTogglerDemo03" data-toggle="collapse" type="button">
                    <i aria-hidden="true" class="fa fa-bars"></i></button>
                <a class="navbar-brand" href="index.php"><img alt="koolmj" class="img-fluid" src="assets/img/logo.jpg"></a>
                <div class="km-navbar-brand-btn-container">
                    <a href="admin/login.php" target="_blank">LOGIN</a>
                </div>
            </div>
        </div>
        <div class="km-navbar-menu">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=product">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=brand">Brands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=store">Stores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=new">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=franchise">Become Franchise</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=resource">Resources</a>
                        </li>
                        <li class="nav-item km-cart px-0">
                            <a class="nav-link" href="index.php?page=cart"><i aria-hidden="true" class="fa fa-shopping-cart fa-2x"></i>
                                <span id="qty"><?php if (isset($_SESSION['total'])) echo $_SESSION['total']; else echo 0; ?></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>