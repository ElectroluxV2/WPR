<?php
abstract class SquareType {
    const Empty = 0;
    const Cross = 1;
    const Circle = 2;
}

abstract class InfoType {
    const CrossWin = 0;
    const CircleWin = 1;
    const Tie = 2;
    const CrossMove = 3;
    const CircleMove = 4;
}

function PrintStyles(): void {
    echo <<<EOL
<style>
body {
    margin: 0;
    width: 100%;
    height: 100%;
    background-color: #3E3E3E;
    display: grid;
    place-items: center;
}

map {
    background-color: #4F4F4F;
}

section {
    position: relative;
}

.grid {
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;

    width: 100%;
    height: 100%;
    display: grid;
    grid-template: repeat(3, 1fr) / repeat(3, 1fr);
}

.grid > img {
    margin: 17px;
}

h1 {
text-align: center;
}

a {
color: coral;
}
</style>
EOL;

}

function PrintInfo($infoType): void {
    switch ($infoType) {
        case InfoType::CircleWin:
            echo '<h1 style="color: #00de24;">Circle win!</h1>';
            break;
        case InfoType::CrossWin:
            echo '<h1 style="color: #ff1010;">Cross win!</h1>';
            break;
        case InfoType::Tie:
            echo '<h1 style="color: coral;">Tie!</h1>';
            break;
        case InfoType::CircleMove:
            echo '<h1 style="color: #00de24;">Circle move.</h1>';
            break;
        case InfoType::CrossMove:
            echo '<h1 style="color: #ff1010;">Cross move.</h1>';
            break;
    }

}

function PrintMap(&$map, $infoType): void {
    PrintStyles();
    echo <<<EOL
<main>

EOL;
    PrintInfo($infoType);
    echo <<<EOL

    <section>
        <img src="img/map.png" usemap="#board" alt="board">
        <div class="grid">
EOL;

    for ($x = 0; $x < 3; $x++) {
        for ($y = 0; $y < 3; $y++) {
            switch ($map[$x][$y]) {
                case SquareType::Empty:
                    echo '<img>';
                    break;
                case SquareType::Circle:
                    echo '<img src="img/circle.png" alt="o">';
                    break;
                case SquareType::Cross:
                    echo '<img src="img/cross.png" alt="x">';
            }
        }
    }

    echo <<<EOL
        </div>
    </section>
    
    <h1><a href="?reset">Reset</a></h1>

    <map name="board">
        <area shape="rect" coords="0,0,200,200" alt="Coffee" href="?x=0&y=0">
        <area shape="rect" coords="200,0,400,200" alt="Coffee" href="?x=0&y=1">
        <area shape="rect" coords="400,0,600,200" alt="Coffee" href="?x=0&y=2">

        <area shape="rect" coords="0,200,200,400" alt="Coffee" href="?x=1&y=0">
        <area shape="rect" coords="200,200,400,400" alt="Coffee" href="?x=1&y=1">
        <area shape="rect" coords="400,200,600,400" alt="Coffee" href="?x=1&y=2">

        <area shape="rect" coords="0,400,200,600" alt="Coffee" href="?x=2&y=0">
        <area shape="rect" coords="200,400,400,600" alt="Coffee" href="?x=2&y=1">
        <area shape="rect" coords="400,400,600,600" alt="Coffee" href="?x=2&y=2">
    </map>
</main>
EOL;

}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['reset'])) {
    session_unset();
}

$map = isset($_SESSION['map']) ? $_SESSION['map'] : [
    [SquareType::Empty, SquareType::Empty, SquareType::Empty],
    [SquareType::Empty, SquareType::Empty, SquareType::Empty],
    [SquareType::Empty, SquareType::Empty, SquareType::Empty]
];

if (!isset($_SESSION['gameEnd'])) {
    $_SESSION['gameEnd'] = false;
}

if (!isset($_SESSION['xMoves'])) {
    $_SESSION['xMoves'] = true;
}
$_SESSION['xMoves'] = !$_SESSION['xMoves'];

extract($_GET);
if (isset($x) && isset($y)) {
    if ($map[$x][$y] == SquareType::Empty && $_SESSION['gameEnd'] == false) {
        $map[$x][$y] = $_SESSION['xMoves'] ? SquareType::Cross : SquareType::Circle;
    }
}

$mapIsFull = true;
for ($x = 0; $x < 3 && $mapIsFull; $x++) {
    for ($y = 0; $y < 3; $y++) {
        if ($map[$x][$y] == SquareType::Empty) {
            $mapIsFull = false;
            break;
        }
    }
}

$xWin = false;
$oWin = false;

$l1 = $map[0][0].$map[0][1].$map[0][2];
$l2 = $map[1][0].$map[1][1].$map[1][2];
$l3 = $map[2][0].$map[2][1].$map[2][2];

if ($l1[0] == $l1[1] && $l1[1] == $l1[2]) {
    if ($l1[0] == SquareType::Cross) $xWin = true;
    else if ($l1[0] == SquareType::Circle) $oWin = true;
} else if ($l2[0] == $l2[1] && $l2[1] == $l2[2]) {
    if ($l2[0] == SquareType::Cross) $xWin = true;
    else if ($l2[0] == SquareType::Circle) $oWin = true;
} else if ($l3[0] == $l3[1] && $l3[1] == $l3[2]) {
    if ($l3[0] == SquareType::Cross) $xWin = true;
    else if ($l3[0] == SquareType::Circle) $oWin = true;
} else if ($l1[0] == $l2[0] && $l2[0] == $l3[0]) {
    if ($l1[0] == SquareType::Cross) $xWin = true;
    else if ($l1[0] == SquareType::Circle) $oWin = true;
} else if ($l1[1] == $l2[1] && $l2[1] == $l3[1]) {
    if ($l1[1] == SquareType::Cross) $xWin = true;
    else if ($l1[1] == SquareType::Circle) $oWin = true;
} else if ($l1[2] == $l2[2] && $l2[2] == $l3[2]) {
    if ($l1[2] == SquareType::Cross) $xWin = true;
    else if ($l1[2] == SquareType::Circle) $oWin = true;
} else if ($l1[0] == $l2[1] && $l2[1] == $l3[2]) {
    if ($l1[0] == SquareType::Cross) $xWin = true;
    else if ($l1[0] == SquareType::Circle) $oWin = true;
} else if ($l1[2] == $l2[1] && $l2[1] == $l3[0]) {
    if ($l1[2] == SquareType::Cross) $xWin = true;
    else if ($l1[2] == SquareType::Circle) $oWin = true;
}

$infoType = $_SESSION['xMoves'] ? InfoType::CircleMove : InfoType::CrossMove;
$_SESSION['gameEnd'] = false;
if (!$xWin && !$oWin && $mapIsFull) {
    $infoType = InfoType::Tie;
    $_SESSION['gameEnd'] = true;
} else if ($xWin) {
    $infoType = InfoType::CrossWin;
    $_SESSION['gameEnd'] = true;
} else if ($oWin) {
    $infoType = InfoType::CircleWin;
    $_SESSION['gameEnd'] = true;
}

$_SESSION['map'] = $map;
PrintMap($map, $infoType);