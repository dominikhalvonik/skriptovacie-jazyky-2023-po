<?php
include_once "auth_check.php";
include_once "../functions.php";

use main\Menu;

$menuObj = new Menu();

$menuItem = $menuObj->getMenuItem($_GET['id']);

include_once "html_menu.php";
?>
<form action="update.php" method="post">
    System name:<br>
    <input type="text" name="sys_name" placeholder="System name" value="<?php echo $menuItem['sys_name']; ?>"><br>
    User name:<br>
    <input type="text" name="user_name" placeholder="User name" value="<?php echo $menuItem['user_name']; ?>"><br>
    Path:<br>
    <input type="text" name="path" placeholder="URL" value="<?php echo $menuItem['path']; ?>"><br>
    <input type="hidden" name="id" value="<?php echo $menuItem['id']; ?>">
    <input type="submit" name="submit" value="Update">
</form>
