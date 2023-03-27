<?php
include_once "../functions.php";

use main\Menu;

$menuObj = new Menu();

$menu = $menuObj->getMenu("header");
?>


<ul>
    <?php
    foreach ($menu as $menuItem) {
        echo "<li>ID: ". $menuItem['id'] . ", User name: " . $menuItem['name'] .
            '<a href="delete.php?id='.$menuItem['id'].'">Delete</a></li>';
    }
    ?>
</ul>
