<?php
// Napisz funkcję liczącą średnicę koła (w parametrze podajemy promień).

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function CalcDiameter($radius): int {
    if (!is_numeric($radius)) throw new Error('Parameter radius must be numeric type!');
    if ($radius < 0) throw new Error('Parameter radius must be greater than 0!');
    return 2 * $radius;
}

echo CalcDiameter(1).'<br>';
echo CalcDiameter('1').'<br>';
echo CalcDiameter(-2).'<br>';
echo CalcDiameter('NAN').'<br>';