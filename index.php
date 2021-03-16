<?php

require_once "init.php";

session_start();
if (!isUserAuthorized()) {
    header('location: register-form.php');
    echo 'not auth';
}
echo 'auth';