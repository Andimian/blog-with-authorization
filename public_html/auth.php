<?php

require_once "init.php";

if (isUserAuthorized())
{
    header("location: index.php");
    die;
}

$name = $_POST['login'];
$user = getUserBylogin($name);
if (!$user) {
    echo "No user with this login";
    die;
}

$password = $_POST['password'];
$passwordHash = getPasswordHash($password);
if ($passwordHash !== $user['password']) {
    echo "No user with this password";
    die;
}

$_SESSION['user_id'] = $user['id'];
header('Location: index.php?authorized=1');