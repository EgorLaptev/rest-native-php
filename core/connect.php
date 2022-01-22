<?php

$db_host = 'localhost';
$db_name = 'flightpool_rest';
$db_char = 'utf8';
$db_user = 'root';
$db_pass = '';

$dsn = "mysql:host=$db_host;dbname=$db_name;char=$db_char;";

$pdo = new PDO($dsn, $db_user, $db_pass);