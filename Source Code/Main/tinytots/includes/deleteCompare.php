<?php

session_start();
unset($_SESSION['compare']);
header('location: ../index.php?page=product');


