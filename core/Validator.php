<?php

require 'connect.php';

Validator::$dbh = $pdo;

class Validator
{

    public static $dbh;

    public function validate($data, $validate)
    {

    }

}