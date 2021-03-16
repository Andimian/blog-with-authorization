<?php

require_once "init.php";

if (isUserAuthorized())
{
    header("location: index.php");
    die;
}