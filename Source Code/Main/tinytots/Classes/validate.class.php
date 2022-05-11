<?php

// create a class to help validate data before insert to database

class validate extends dbh
{

    public function checkEmpty(array $a)
    {
        foreach ($a as $value) {
            if (empty($value)) {
                return true;
            }
        }
        return false;
    }

//    Check admin Login
    public function checkAdminLogin($userName, $pw)
    {
        $flag = false;
        $admin = new admin();
        $data = $admin->getAdmin($userName);
        if (count($data) > 0) {
            if (password_verify($pw, $data[0]["Password"])) {
                $flag = true;
            };
        }
        return $flag;
    }

//    Check register admin
    public function checkRegisterUserNameExists($userName)
    {
        $flag = true;
        $admin = new admin();
        $data = $admin->getAdmin($userName);
        if (!$data) {
            $flag = false;
        }
        return $flag;
    }

    //   Check UserName valid ( username must be at least 7 characters)
    public function CheckUserNameValid($UserName)
    {
        $flag = true;
        $patternUsername = "#^.\S{7,}$#";
        if (!preg_match($patternUsername, $UserName)) {
            $flag = false;

        };
        return $flag;
    }

// check  pw valid (username must be at least 7 characters)
    public function CheckPwValid($pw)
    {
        $flag = true;
        $patternPw = "#^.\S{7,}$#";
        if (!preg_match($patternPw, $pw)) {
            $flag = false;
        }
        return $flag;
    }
    // check product name exist
    public function CheckProductName($name){
        $flag = true;
        $product = new product();
        $data = $product -> getProductName($name);
        if (count($data) > 0){
            $flag = false;
        }
        return $flag;
    }
    // check brand name exist
    public function CheckBrandName($name){
        $flag = true;
        $brand = new brand();
        $data = $brand ->getBrandName($name);
        if(!empty($data)){
            $flag = false;
        }
        return $flag;
    }
    // check category name exist
     public function CheckCategoryName($name){
        $flag = true;
        $brand = new category();
        $data = $brand ->getCategoryName($name);
        if(!empty($data)){
            $flag = false;
        }
        return $flag;
    }
    // check phone valid ( phone number must be between 8 and 15 characters)
    public function checkPhoneValid($phone){
         $flag = true;
        $patternPw = "#^\S[0-9]{8,15}$#";
        if (!preg_match($patternPw, $phone)) {
            $flag = false;
        }
        return $flag;
    }

}