<?php declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["data"]["personCount"]) || strlen($_SESSION["data"]["personCount"]) === 0) {
    header("Location: /w7/exercise-1/subsection-1.php");
    die();
    // http_redirect("/subsection-1.php");
}

for ($i = 1; $i <= $_SESSION["data"]["personCount"]; $i++) {
    if (!isset($_REQUEST["givenName${i}"])) {
        if (!isset($_SESSION["data"]["givenName${i}"])) {
            header("Location: /w7/exercise-1/fill-rest-data.php");
            die();
        } else {
            continue;
        }
    }
    $_SESSION["data"]["givenName${i}"] = filter_var($_REQUEST["givenName${i}"], FILTER_SANITIZE_STRING);
    $_SESSION["data"]["familyName${i}"] = filter_var($_REQUEST["familyName${i}"], FILTER_SANITIZE_STRING);
}

include_once "printSummary.php";

printSummary($_SESSION["data"]);