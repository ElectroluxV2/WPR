<?php declare(strict_types=1);
// Przerób zadanie z poprzednich zajęć, kalkulator, tak aby:
// każde działanie (dodawanie, odejmowanie itp) było umieszczone w oddzielnej funkcji

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function PrintForm(float $a, float $b, float $result): void {
    echo <<<EOL
<form method="post" name="calc">
    <fieldset>
    
        <input type="number" step="0.01" name="a" value="${a}" required>
        
        <label for="+">+</label>
        <input type="radio" name="operator" value="+" id="+" required>
        
        <label for="-">-</label>
        <input type="radio" name="operator" value="-" id="-">
        
        <label for=":">:</label>
        <input type="radio" name="operator" value="/" id=":">
        
        <label for="*">*</label>
        <input type="radio" name="operator" value="*" id="*">
        
        <input type="number" step="0.01" name="b" value="${b}" required>
    
        <input type="submit" value="=">
        
        <code>${result}</code>
    
    </fieldset>
</form>
EOL;
}

function Add(float $a, float $b): float {
    return $a + $b;
}

function Subtract(float $a, float $b): float {
    return $a - $b;
}

function Multiply(float $a, float $b): float {
    return $a * $b;
}

function Divide(float $a, float $b): float {
    return $a / $b;
}


$result = null;
$a = 0;
$b = 0;
$operator = null;
extract($_POST);

$a = (float) $a;
$b = (float) $b;

$result = match ($operator) {
    '+' => Add($a, $b),
    '-' => Subtract($a, $b),
    '*' => Multiply($a, $b),
    '/' => Divide($a, $b),
    default => 0,
};

PrintForm($a, $b, $result);