<?php declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_REQUEST["personCount"])) {
    header("Location: /w7/exercise-1/subsection-1.php");
    die();
    // http_redirect("/subsection-1.php");
}

// Save data
$_SESSION["data"] = filter_var_array($_REQUEST, [
    "givenName" => FILTER_SANITIZE_STRING,
    "familyName" => FILTER_SANITIZE_STRING,
    "email" => FILTER_SANITIZE_EMAIL,
    "personCount" => FILTER_SANITIZE_NUMBER_INT,
    "ccNumber" => FILTER_SANITIZE_STRING,
    "ccDate" => FILTER_SANITIZE_STRING,
    "ccControl" => FILTER_SANITIZE_NUMBER_INT
]);

// Default values
for ($i = 1; $i <= $_SESSION["data"]["personCount"]; $i++) {

    // Do not override
    if (isset($_SESSION["data"]["givenName${i}"])) continue;

    $_SESSION["data"]["givenName${i}"] = "";
    $_SESSION["data"]["familyName${i}"] = "";
}

include_once "printExtendedForm.php";

printExtendedForm($_SESSION["data"]);