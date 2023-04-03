<?php
include_once "auth_check.php";
include_once "../functions.php";

use main\Menu;

if(isset($_POST['submit'])) {
    $menuObj = new Menu();
    $update = $menuObj->updateMenuItem(
        $_POST['id'],
        $_POST['sys_name'],
        $_POST['user_name'],
        $_POST['path']
    );
    if($update) {
        header('Location: menu.php?status=2');
    } else {
        header('Location: menu.php?status=3');
    }
} else {
    header('Location: menu.php');
}