<?php
// Napisz funkcję, która wyświetli w konsoli tabliczkę mnożenia w formie kwadratu o boku
// podanym jako parametr.

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function ShowMultiplicationTableBrowser($width = 12) {
    $widthMinusOne = $width - 1;

    echo <<<EOL
<style>
    body {
        background-color: black;
        color: white;
        margin: 0;
        height: 100%;
        box-sizing: border-box;
        padding: max(0px, calc((100vh - 100vw) / 2)) max(0px, calc((100vw - 100vh) / 2));
        display: grid;
        grid-template: repeat(${width}, 1fr) / repeat(${width}, 1fr);
        grid-gap: 1em;
        place-items: center;
    }
    
    body > div {
        height: 100%;
        width: 100%;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center; 
        background-color: #222;
    }
    
    body > div:first-of-type {
        visibility: hidden;
    }
    
    body > :is(div:nth-child(${width}n - ${widthMinusOne}), div:nth-child(-n + ${width} )) {
        background-color: darkblue;
    }
</style>
EOL;


    for ($x = 1; $x <= $width; $x++) {
        for ($y = 1; $y <= $width; $y++) {
            echo "<div>".$x*$y."</div>";
        }
    }
}

function ShowMultiplicationTableTerminal($width) {
    $max = strlen($width * $width);


    for ($x = 1; $x <= $width; $x++) {
        if ($x > 1) print str_repeat('-', $width * ($max + 1)).PHP_EOL;
        for ($y = 1; $y <= $width; $y++) {
            if ($y > 1) print '|';
            if ($x === 1 && $y === 1) print str_repeat(' ', $max);
            else printf("%-${max}d", $x * $y);
        }
        echo PHP_EOL;
    }
}

if (PHP_SAPI === 'cli') {
    ShowMultiplicationTableTerminal($argc > 1 ? $argv[1]: 14);
} else {
    ShowMultiplicationTableBrowser(14);
}