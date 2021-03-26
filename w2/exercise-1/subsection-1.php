<?php
// Prosty kalkulator:
// - stwórz formularz z miejscem na wpisanie 2 liczb oraz wyborem działania
// (dodawanie, odejmowanie, mnożenie, dzielenie)
// - stwórz skrypt PHP, który obsłuży dane z formularza (na podstawie wybranego
// działania policzy i wyświetli wynik w przeglądarce)

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function PrintForm($a, $b, $result) {
    echo <<<EOL
<form method="post" name="calc">
    <fieldset>
    
        <input type="number" name="a" value="${a}" required>
        
        <input type="radio" name="operator" value="+" id="+" required>
        <label for="+">+</label>
        
        <input type="radio" name="operator" value="-" id="-">
        <label for="-">-</label>
        
        <input type="radio" name="operator" value="/" id=":">
        <label for=":">:</label>
        
        <input type="radio" name="operator" value="*" id="*">
        <label for="*">*</label>
        
        <input type="number" name="b" value="${b}" required>
    
        <input type="submit" value="=">
        
        <code>${result}</code>
    
    </fieldset>
</form>
EOL;
}

$result = null;
$a = null;
$b = null;
extract($_POST);

// Way how html forms works ensures us that other props will be set too
if (isset($operator)) {
    eval("\$result = ".htmlentities($a).htmlentities($operator).htmlentities($b).";");
}


PrintForm($a, $b, $result);