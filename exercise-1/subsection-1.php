<?php
// Napisz funkcję zwracającą wynik - symulację rzutu kostką.

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function DiceRoll(): int {
    return rand(1, 6);
}

echo DiceRoll().'<br>';
echo DiceRoll().'<br>';
echo DiceRoll().'<br>';
echo DiceRoll().'<br>';
echo DiceRoll().'<br>';