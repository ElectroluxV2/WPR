<?php declare(strict_types=1);

$username = "user";
$password = "pass";
$database = "dadb";
$connection = new mysqli("localhost", $username, $password, $database);

if ($connection->connect_errno) {
    die($connection->connect_error);
}
