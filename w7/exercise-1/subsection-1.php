<?php declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "printEntryForm.php";

// Default values
if (!isset($_SESSION["data"])) {
    $_SESSION["data"] = [
        "givenName" => "",
        "familyName" => "",
        "email" => "",
        "personCount" => "",
        "ccNumber" => "",
        "ccDate" => "",
        "ccControl" => ""
    ];
}

printEntryForm($_SESSION["data"]);
