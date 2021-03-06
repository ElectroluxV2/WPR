<?php
// Napisz funkcję, zwracającą maksymalny element tablicy losowych liczb (bez używania
// gotowych funkcji PHP) w 4 wersjach: for, while, do while, foreach.

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

const ARRAY_MAX_LENGTH = 20;

// TODO: Don't know if without reference php creates unnecessary copy of array
function GetMaximumValueFor(&$arrayRef, $arrayLength): int {
    $max = PHP_INT_MIN;

    for ($index = 0; $index < $arrayLength; $index++) {
        // TODO: Don't know if it's constantly reassigning if condition fails
        $max = $arrayRef[$index] > $max ? $arrayRef[$index] : $max;
    }
    return $max;
}

function GetMaximumValueWhile(&$arrayRef, $arrayLength): int {
    $max = PHP_INT_MIN;
    $index = 0;
    while ($index < $arrayLength) {
        $max = $arrayRef[$index] > $max ? $arrayRef[$index] : $max;
        $index++;
    }

    return $max;
}

function GetMaximumValueDoWhile(&$arrayRef, $arrayLength): int {
    $max = PHP_INT_MIN;
    $index = 0;
    do {
        $max = $arrayRef[$index] > $max ? $arrayRef[$index] : $max;
    } while (++$index < $arrayLength);

    return $max;
}

function GetMaximumValueForEach(&$arrayRef): int {
    $max = PHP_INT_MIN;
    foreach ($arrayRef as $number) {
        $max = $number > $max ? $number : $max;
    }

    return $max;
}

$randomArray = [];
for ($i = 0; $i < rand(1, ARRAY_MAX_LENGTH) + 1; $i++) {
    array_push($randomArray, rand(PHP_INT_MIN, PHP_INT_MAX));
}

highlight_string("<?php\n\$randomArray =\n" . var_export($randomArray, true) . ";\n?>\n");

// https://stackoverflow.com/a/23410780/7132461 php-array-count-or-sizeof
$length = count($randomArray);

echo GetMaximumValueFor($randomArray, $length).'<br>';
echo GetMaximumValueWhile($randomArray, $length).'<br>';
echo GetMaximumValueDoWhile($randomArray, $length).'<br>';
echo GetMaximumValueForEach($randomArray).'<br>';