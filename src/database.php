<?php

$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "final_task";

try {
    $connection = new mysqli ($servername, $username, $password, $dbname);

    if ($connection->connect_error) {
        throw new Exception();
        die();
    } else {
        $isDatabaseConnect = true;
    }
} catch (Exception $e) {
    $isDatabaseConnect = false;
}


/******************/


