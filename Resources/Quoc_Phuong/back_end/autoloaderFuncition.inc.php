<?php 
    function myAutoLoaderFunction($functionName){
        $path = "function/";
        $extention = ".inc.php";
        $fullPath = $path.$functionName.$extention;

        include_once $fullPath;
    }

    spl_autoload_register("myAutoLoaderFunction");