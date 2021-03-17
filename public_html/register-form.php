<?php

require_once "init.php";

if (isUserAuthorized()) {
    header('location: index.php');
    die;
}
echo 'register and login form';
?>

Register:
<br>
<br>
<form action="register.php" method="POST">
    Login:<input type="text" value="" name="login"><br>
    Password:<input type="text" name="password" value=""><br>
    <input type="submit" value="Register">
</form>
<br>
<br>
<br>
Authorization:
<br>
<br>
<form action="auth.php" method="POST">
    Login:<input type="text" value="" name="login"><br>
    Password:<input type="text" name="password" value=""><br>

    <input type="submit" value="Login">
</form>

