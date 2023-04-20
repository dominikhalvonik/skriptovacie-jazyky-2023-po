<?php
include_once "../classes/Auth.php";

use ukf\classes\Auth;

$auth = new Auth("localhost", 3306, "root", "", "sj-2023-2");

if(isset($_POST['login'])) {
    $login = $auth->login($_POST['username'], $_POST['password']);
    if($login) {
        session_start();
        $_SESSION['login'] = true;
        header('Location: home.php');
    } else {
        echo "Incorrect login <br>";
    }
} else {
    ?>
    <form action="" method="post">
        Meno: <br>
        <input type="text" name="username" value="" placeholder="Username"><br>
        Heslo: <br>
        <input type="password" name="password" value="" placeholder="Password"> <br>
        <input type="submit" name="login" value="Login">
    </form>
    <?php
}