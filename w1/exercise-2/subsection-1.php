<?php
// Napisz funkcję, która zawiera w sobie tablicę losowych liczb. Funkcja powinna zwracać
// wartość elementu tablicy o indeksie podanym jako argument.

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function RandomArrayRandomReturn($index): int {
    if (!is_numeric($index)) throw new Error('Parameter index must be numeric type!');
    if ($index <= 0) throw new Error('Parameter index must be greater than 0!');

    $randomArray = [];
    for ($i = 0; $i < $index + 1; $i++) {
        array_push($randomArray, rand(PHP_INT_MIN, PHP_INT_MAX));
    }

    return $randomArray[$index];
}

echo RandomArrayRandomReturn(1).'<br>';
echo RandomArrayRandomReturn(0).'<br>';
echo RandomArrayRandomReturn(-1).'<br>';
echo RandomArrayRandomReturn(1 + PHP_INT_MAX).'<br>';