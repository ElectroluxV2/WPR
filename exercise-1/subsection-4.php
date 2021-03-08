<?php
// Napisz funkcję, która z podanego numeru PESEL odczyta datę urodzenia i zwróci ją w
// formacie dd-mm-rr.

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function ReadDateFromId($id): string {
    if (!is_string($id)) throw new Error('Parameter id must be string type!');
    if (!ctype_digit($id)) throw new Error('Parameter id must contain only digits!');

    $YY = substr($id, 0, 2);
    $MM = substr($id, 2, 2);
    $DD = substr($id, 4, 2);

    return $DD.'-'.$MM.'-'.$YY;
}

echo ReadDateFromId('13242200705').'<br>';
echo ReadDateFromId('01270503275').'<br>';
echo ReadDateFromId('aaabbbccc').'<br>';
echo ReadDateFromId([]).'<br>';