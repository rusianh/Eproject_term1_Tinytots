<?php



function myAutoLoaderClasses($className){
    $path = "Classes/";
    $extension = ".class.php";
    $fullPath =   $path . $className. $extension;

    include_once $fullPath;
}

spl_autoload_register("myAutoLoaderClasses");