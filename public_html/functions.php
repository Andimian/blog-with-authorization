<?php

function isUserAuthorized(): bool
{
    return isset($_SESSION['user_id']);
}

function getPasswordHash(string $userPass): string
{
    return sha1($userPass . 'asdfla');
}

function getUserByLogin(string $login): array

{
    $query = "SELECT * FROM users WHERE `name` = '$login' LIMIT 1";
    $ret = getDbConnection()->query($query);
    $users = $ret->fetchAll();
    return $users[0] ?? [];
}
