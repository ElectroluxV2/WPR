<?php
// Zmodyfikuj funkcję z zadania 1.1, by przyjmowała argument - liczbę rzutów kostką. I
// zwracała tablicę wyników.

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function DiceRollMultiple($numberOfThrows): array {
    if ($numberOfThrows <= 0) throw new Error('Parameter numberOfThrows must be greater than 0!');

    $result = [];
    for ($i = 0; $i < $numberOfThrows; $i++)
        array_push($result, rand(1, 6));
    return $result;
}

$throws = DiceRollMultiple(rand(1, '6'));
highlight_string("<?php\n\$throws =\n" . var_export($throws, true) . ";\n?>\n");
$throws = DiceRollMultiple(rand(1, 'z'));