<?php

// create a function that automatically loads the second level directory 

function myAutoLoaderClassesC2($className){
    $path = "../Classes/";
    $extension = ".class.php";
    $fullPath =   $path . $className. $extension;

    include_once $fullPath;
}

spl_autoload_register("myAutoLoaderClassesC2");

