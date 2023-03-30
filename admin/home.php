<?php
include_once "../functions.php";

use ukf\Menu;

$menuObj = new Menu("localhost", 3306, "root", "", "sj-2023-2");
$menu = $menuObj->getMenuData('header');

//$_GET, $_POST, $_REQUEST, $_ENV, $_FILES, $_SERVER, $_SESSION, $_COOKIE
if (isset($_POST['submit'])) {
    $insert = $menuObj->insertMenuItem($_POST['sys_name'], $_POST['user_name'], $_POST['path']);
    if ($insert) {
        header('Location: home.php');
    } else {
        echo "Error";
    }
} else {

    if (isset($_GET['status']) && $_GET['status'] == 1) {
        echo "<strong>Deleted correctly</strong>";
    }

    echo "<br><br><ul>";

    foreach ($menu as $sysName => $menuItem) {
        echo "<li>
            Sys name: " . $sysName . ", 
            User name: " . $menuItem['name'] . ", 
            URL: " . $menuItem['path'] . "
            <a href='delete.php?id=" . $menuItem['id'] . "'>Delete</a>
            </li>";
    }

    echo "</ul>";
    ?>

    <br><br><br>
    <form action="home.php" method="post">
        System name:<br>
        <input type="text" name="sys_name" value="" placeholder="System name"><br>
        User name:<br>
        <input type="text" name="user_name" value="" placeholder="User name"><br>
        Path:<br>
        <input type="text" name="path" value="" placeholder="URL"><br>
        <input type="submit" name="submit" value="Insert">
    </form>
    <?php
}
?>