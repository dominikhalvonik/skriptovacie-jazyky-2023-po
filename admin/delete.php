<?php
include_once "auth_check.php";
include_once "../functions.php";

use main\Menu;

$menuObj = new Menu();

if(isset($_GET['id'])) {
    $delete = $menuObj->deleteMenuItem($_GET['id']);
    if($delete) {
        header('Location: menu.php');
    } else {
        echo "Error";
    }
} else {
    header('Location: menu.php');
}