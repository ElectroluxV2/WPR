<?php declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../src/parseRequestData.php";
include_once "../src/printExtendedForm.php";

$_SESSION["data"] = parseRequestedData($_REQUEST, $_SESSION);
printExtendedForm($_SESSION["data"]);