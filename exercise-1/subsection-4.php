<?php
// Napisz funkcję, która z podanego numeru PESEL odczyta datę urodzenia i zwróci ją w
// formacie dd-mm-rr.

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function ReadDateFromId($id): string {
    if (!is_string($id)) throw new Error('Parameter id must be string type!');
    if (!ctype_digit($id)) throw new Error('Parameter id must contain only digits!');

    $month = substr($id,2,2);
    $day = substr($id,4,2);

    $additionalMonths = [80, 0, 20, 40, 60];
    $monthsBase = range(1,12);
    $months = [];
    foreach ($additionalMonths as $additionalMonth) {
        foreach ($monthsBase as $monthBase) {
            $months[] = $additionalMonth + $monthBase;
        }
    }

    if (!in_array($month, $months)) throw new Error('Invalid date');

    $century = 0;
    if (substr($month,0,1) == '0' || substr($month,0,1) == '1') $century = 1900;
    if (substr($month,0,1) == '8' || substr($month,0,1) == '9') $century = 1800;
    if (substr($month,0,1) == '2' || substr($month,0,1) == '3') $century = 2000;
    if (substr($month,0,1) == '5' || substr($month,0,1) == '4') $century = 2100;
    if (substr($month,0,1) == '6' || substr($month,0,1) == '7') $century = 2200;
    if ($century == '2000') $month = $month - 20;
    if ($century == '1800') $month = $month - 80;
    if ($century == '2100') $month = $month - 40;
    if ($century == '2200') $month = $month - 60;

    $year = $century + substr($id,0,2);
    return $day.'-'.$month.'-'.$year;
}

echo ReadDateFromId('13242200705').'<br>';
echo ReadDateFromId('01270503275').'<br>';
echo ReadDateFromId('aaabbbccc').'<br>';
echo ReadDateFromId([]).'<br>';