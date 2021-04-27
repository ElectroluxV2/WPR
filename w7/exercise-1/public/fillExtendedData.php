<?php declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../src/parseRequestData.php";
include_once "../src/printExtendedForm.php";

// NOTE: It is possible to get negative people count but not 0
// and it's possible only when hard pasting url via omnibox and even negative index being present nothing really breaks
// IMHO it's not worth to fix it

$_SESSION["data"] = parseRequestedData($_REQUEST, $_SESSION);
printExtendedForm($_SESSION["data"]);