<?php
// Napisz funkcję, która sprawdzi, czy dana liczba jest liczbą pierwszą.
// W swoim programie umieść zmienną, która policzy wszystkie iteracje pętli, potrzebne do
// wykonania obliczeń. Spróbuj tak zmodyfikować program, by było potrzeba jak najmniej
// iteracji (przy zachowaniu prawidłowego działania).

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function IsPrimary($n, &$r): bool {
    if ($n < 2) return false;
    for ($i = 2, $r = 1; $i * $i <= $n; $i++, $r++)
        if ($n % $i === 0) return false;

    return true;
}

$tests = [100, 97, 1621, 22333];

foreach ($tests as $test) {
    $r = 0;
    echo $test.' '.(IsPrimary($test, $r) ? 'tak' : 'nie').', r = '.$r.'<br>';
}

