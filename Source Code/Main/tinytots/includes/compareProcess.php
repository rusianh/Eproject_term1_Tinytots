<?php

session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $compare[] = $id;


    if (!isset($_SESSION['compare'])) {
        $_SESSION['compare'] = $compare;

    } else {
        $compare = $_SESSION['compare'];
        if (!in_array($id, $compare)) {
            $compare[] = $id;

        }
        if (count($compare) > 2) {
            array_splice($compare, 2);
        }

    }
    $_SESSION['compare'] = $compare;
    if (count($_SESSION['compare']) == 1) {
        echo 'Please choose one more product to compare !! ---- ';
    } else {
        echo 'You have selected to compare two products, please go to compare for details !! ----<button type="button" id="goto" style="background: #000303" class="btn btn-success" onclick="window.open(\'compare.php\',\'_blank\');" "> Go To Comparison </button>';
    }



}

