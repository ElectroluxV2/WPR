<?php
// Napisz funkcję, która zastąpi wszystkie niepożądane słowa gwiazdkami (*).
// Funkcja ma zawierać w sobie tablicę niepożądanych słów. Zdanie do ocenzurowania
// powinna otrzymać w parametrze.

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function Censor($text): string {
    $forbiddenWords = [
        'Dziekan',
        'Student',
        'Depresja',
        'Informatyk'
    ];

    foreach ($forbiddenWords as $word) {
        $censored = str_repeat('*', strlen($word));
        $text = str_ireplace($word, $censored, $text);
    }

    return $text;
}

echo Censor('Lorem Dziekan Ipsum StUdEnT');