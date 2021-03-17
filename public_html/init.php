<?php
//require_once "init.php";
session_start();
require_once "functions.php";

/** @return PDO */
function getDbConnection(): PDO
{
    static $DB;
    if (!$DB) {
        try {
            $DB = new PDO('mysql:dbname=blog;host=localhost', 'root', '');
        } catch (Exception $e) {
            die('error: ' . $e->getMessage());
        }
    }
    return $DB;
}