<?php
include_once "auth_check.php";
include_once "../functions.php";

use main\Menu;

$menuObj = new Menu();

$menu = $menuObj->getMenu("header");

include_once "html_menu.php";

if(isset($_GET['status']) && $_GET['status'] == 2) {
    echo "<strong>Value updated correctly</strong><br><br>";
} elseif (isset($_GET['status']) && $_GET['status'] == 3) {
    echo "<strong>Value cannot be updated</strong><br><br>";
}
?>


<ul>
    <?php
    foreach ($menu as $menuItem) {
        echo "<li>ID: ". $menuItem['id'] . ", User name: " . $menuItem['name'] . "  " .
            '<a href="delete.php?id='.$menuItem['id'].'">Delete</a> /
             <a href="update_form.php?id='.$menuItem['id'].'">Update</a>
            </li>';
    }
    ?>
</ul>
