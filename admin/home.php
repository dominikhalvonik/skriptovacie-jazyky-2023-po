<?php
include_once "auth_check.php";
include_once "../functions.php";

use main\Menu;

$menuObj = new Menu("localhost", 3306, "root", "", "sj-2023");
//$_GET, $_POST, $_REQUEST, $_COOKIE, $_SESSION, $_SERVER, $_FILES, $_ENV
if(isset($_POST['submit'])) {
    $insert = $menuObj->insertMenuItem($_POST['sys_name'], $_POST['user_name'], $_POST['path']);
    if($insert) {
        header('Location: home.php?status=1');
    } else {
        echo "Unable to insert values";
    }
} else {
    include_once "html_menu.php";
    if(isset($_GET['status']) && $_GET['status'] == 1) {
        echo "<strong>Value inserted</strong><br><br>";
    }
?>
<form action="home.php" method="post">
    System name:<br>
    <input type="text" name="sys_name" placeholder="System name" value=""><br>
    User name:<br>
    <input type="text" name="user_name" placeholder="User name" value=""><br>
    Path:<br>
    <input type="text" name="path" placeholder="URL" value=""><br>
    <input type="submit" name="submit" value="Insert">
</form>
<?php
}
?>