<?php

require_once "init.php";

if (!isUserAuthorized()) {
    header('location: register-form.php');
    echo 'not auth';
}
echo 'Пользователь авторизован';
if (!empty($_GET['authorized'])) {
    echo '<br> по массиву GET видно, что всё гуд';
}