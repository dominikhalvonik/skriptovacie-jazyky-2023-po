<?php
include_once "auth_check.php";
include_once "../functions.php";

use ukf\Menu;

$menuObj = new Menu("localhost", 3306, "root", "", "sj-2023-2");

if(isset($_POST['submit'])) {
    $update = $menuObj->updateMenuItem($_POST['id'], $_POST['sys_name'], $_POST['user_name'], $_POST['path']);
    if($update) {
        header('Location: home.php');
    } else {
        echo "Error";
    }
} else {
    $menuItem = $menuObj->getMenuItem($_GET['id']);
    ?>

<form action="update.php" method="post">
    System name:<br>
    <input type="text" name="sys_name" value="<?php echo $menuItem['sys_name']; ?>" placeholder="System name"><br>
    User name:<br>
    <input type="text" name="user_name" value="<?php echo $menuItem['user_name']; ?>" placeholder="User name"><br>
    Path:<br>
    <input type="text" name="path" value="<?php echo $menuItem['path']; ?>" placeholder="URL"><br>
    <input type="hidden" name="id" value="<?php echo $menuItem['id']; ?>">
    <input type="submit" name="submit" value="Update">
</form>

<?php
}
?>