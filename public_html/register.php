<?php

require_once "init.php";

if (isUserAuthorized()) {
    header('location: index.php');
    die;
}

$name = $_POST['login'];
$originalPassword = $_POST['password'];
$password = getPasswordHash($originalPassword);

if (getUserBylogin($name)) {
    echo "user with the same name already exists";
    die;
}

$query = "INSERT INTO users (name, password) VALUES('$name', '$password')";
$ret = getDbConnection()->query($query);

if ($ret) {
    echo 'User created';
} else {
    var_dump(getDbConnection()->errorInfo());
    echo 'error';
}