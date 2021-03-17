<?php

require_once "init.php";

//если не авторизован, отсылаем на форму регистрации
if (!isUserAuthorized()) {
    header('location: register-form.php');
    echo 'not auth';
}
echo 'Пользователь авторизован';

//Просто для себя проверочка
if (!empty($_GET['authorized'])) {
    echo '<br> по массиву GET видно, что всё гуд';
}

include "postForm.php"; //форма отправки постов
echo "<br><br><br><br>";
include "blog.php"; //вывод постов