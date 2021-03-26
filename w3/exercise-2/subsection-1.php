<?php
// Czy dana liczba jest liczbą pierwszą?
// - stwórz formularz z miejscem na wpisanie liczby
// - stwórz skrypt PHP, który przyjmie liczbę z formularza (sprawdzi czy to na pewno
// liczba całkowita dodatnia), a następnie wywoła funkcję, sprawdzającą czy liczba jest
// liczbą pierwszą
// - w swoim programie umieść zmienną, która policzy wszystkie iteracje pętli,
// potrzebne do wykonania obliczeń. Spróbuj tak zmodyfikować program, by było
// potrzeba jak najmniej iteracji (przy zachowaniu prawidłowego działania).

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function IsPrimary($n, &$r): bool {
    if ($n < 2) return false;
    for ($i = 2, $r = 1; $i * $i <= $n; $i++, $r++)
        if ($n % $i === 0) return false;

    return true;
}

function PrintForm($a, $result) {
    echo <<<EOL
<form method="post" name="primary">
    <fieldset>
    
        <input type="number" name="a" value="${a}" required>
        
        <input type="submit" value="Check">
        
        <code>${a} ${result}</code>
    
    </fieldset>
</form>
EOL;
}

$result = null;
$a = null;
extract($_POST);

// Way how html forms works ensures us that other props will be set too
if (isset($a)) {
    $r = 0;
    if (is_float($a)) {
        $result = "is float!";
    } else if ($a < 0) {
        $result = "must be greater than 0!";
    } else if (IsPrimary($a, $r)) {
        $result = "is primary number, computed within $r iterations.";
    } else {
        $result = "is not primary number, computed within $r iterations.";
    }
}


PrintForm($a, $result);