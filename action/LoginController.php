<?php
session_start ();
if (isset($_POST ['username']) && isset($_POST ['password'])) {
    $hashUsername = stripslashes ($_POST ['username']);
    $password = stripslashes ($_POST ['password']);

    require_once ("../manager/LoginManager.php");
    $manager = new LoginManager ();
    $manager->Login($hashUsername, $password);
}
?>
