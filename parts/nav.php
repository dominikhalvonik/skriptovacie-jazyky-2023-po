<?php
include_once "functions.php";

use ukf\Menu;

$menuObj = new Menu();

$menu = $menuObj->getMenuData("header");
?>

<header class="container main-header">
    <div class="logo-holder">
        <a href="<?php echo $menu['home']['path']; ?>">
            <img alt="img" src="img/logo.png" height="40">
        </a>
    </div>
    <nav class="main-nav">
        <ul class="main-menu" id="main-menu container">
            <?php $menuObj->printMenu($menu); ?>
        </ul>
        <a class="hamburger" id="hamburger">
            <i class="fa fa-bars"></i>
        </a>
    </nav>
</header>