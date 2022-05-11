<?php 
    function myAutoLoaderClasses($className){
        $path = "classes/";
        $extention = ".class.php";
        $fullPath = $path.$className.$extention;

        include_once $fullPath;
    }

    spl_autoload_register("myAutoLoaderClasses");