<?php
include_once "auth_check.php";
include_once "../functions.php";

use ukf\Menu;

$menuObj = new Menu("localhost", 3306, "root", "", "sj-2023-2");

if(isset($_GET['id'])) {
    $delete = $menuObj->deleteMenuItem($_GET['id']);
    if($delete) {
        header('Location: home.php?status=1');
    } else {
        echo "Error";
    }
} else {
    header('Location: home.php');
}