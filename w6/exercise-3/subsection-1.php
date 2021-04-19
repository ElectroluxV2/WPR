<?php declare(strict_types=1);
// Errors should be disabled in production
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Include functions, should die on missing file
include_once "../../w4/exercise-3/printScript.php";
include_once "../../w4/exercise-3/prices.php";
include_once "../../w4/exercise-3/printForm.php";
include_once "../../w4/exercise-3/getReservationResult.php";
include_once "../../w4/exercise-3/saveDataToCSV.php";

// Handle data input
$defaultValues = [
    "personCount" => 0,
    "begin" => "",
    "end" => "",
    "country" => "",
    "ccNumber" => "",
    "ccExp" => "",
    "ccCsc" => "",
    "firstName" => "",
    "secondName" => "",
    "address" => "",
    "email" => "",
];
$defaultValuesNonRequired = [
    "ibc" => "",
    "iac" => "",
    "iay" => "",
    "firstName2" => "",
    "secondName2" => "",
    "firstName3" => "",
    "secondName3" => "",
    "firstName4" => "",
    "secondName4" => ""
];

// Read data from post
$data = array_merge($defaultValues, $_REQUEST);
$data = array_merge($defaultValuesNonRequired, $data);

// Assuming data is safe to save in cookie
if (isset($_COOKIE['data'])) {
    $data = array_merge($_REQUEST, unserialize($_COOKIE['data']));
    var_export($data);
}

// Empty form or not fully filled
if (count(array_diff_key($defaultValues, $_REQUEST)) > 0) {
    // Just print form
    PrintScript();
    PrintForm($data, "");
    die;
}

// Execute logic
$result = GetReservationResult($data);

// Save data to file
saveDataToCSV($defaultValues + $defaultValuesNonRequired, $data);
// Save  data to cookie
setcookie('data', serialize($data));

// Print page to user
PrintScript();
PrintForm($data, $result);