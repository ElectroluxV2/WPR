<?php declare(strict_types=1);
// Przerób zadanie z poprzednich zajęć, kalkulator, tak aby:
// wszystkie funkcje były umieszczone w innym pliku niż główny skrypt

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include_once "add.php";
include_once "divide.php";
include_once "multiply.php";
include_once "printForm.php";
include_once "subtract.php";

$result = null;
$a = 0;
$b = 0;
$operator = null;
extract($_POST);

$a = (float) $a;
$b = (float) $b;

$result = match ($operator) {
    '+' => Add($a, $b),
    '-' => Subtract($a, $b),
    '*' => Multiply($a, $b),
    '/' => Divide($a, $b),
    default => 0,
};

PrintForm($a, $b, $result);