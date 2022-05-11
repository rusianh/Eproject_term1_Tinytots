<?php
function myAutoLoaderFunction($functionName){
    $path = "Function/";
    $extension = ".inc.php";
    $fullPath =   $path . $functionName. $extension;

    include_once $fullPath;
}

spl_autoload_register("myAutoLoaderFunction");
