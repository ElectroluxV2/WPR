<?php declare(strict_types=1);
// Errors should be disabled in production
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Include functions, should die on missing file
include_once "printScript.php";
include_once "prices.php";
include_once "printForm.php";
include_once "getReservationResult.php";
include_once "saveDataToCSV.php";

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


// Print page to user
PrintScript();
PrintForm($data, $result);