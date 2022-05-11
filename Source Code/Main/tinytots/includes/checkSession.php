<?php
session_start();
if(!isset($_SESSION['userName'])){
    header("location: ./login.php");
};
