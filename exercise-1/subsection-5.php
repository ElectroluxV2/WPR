<?php
// Kalkulator pól powierzchni (używając switch).
// - program zapytuje, jaką figurę chcemy obliczyć (trójkąt, prostokąt, trapez)
// - w zależności od wybranej figury program uruchamia odpowiednią funkcję
// - każda figura ma mieć swoją osobną funkcję, która zapyta o wymiary i policzy pole

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

abstract class ShapeType {
    const Triangle = 0;
    const Rectangle = 1;
    const Trapeze = 2;
}

function CalcTriangleSurface($a, $h): float {
    if (!is_numeric($a)) throw new Error('Parameter a must be numeric type!');
    if ($a < 0) throw new Error('Parameter a must be greater than 0!');

    if (!is_numeric($h)) throw new Error('Parameter h must be numeric type!');
    if ($h < 0) throw new Error('Parameter h must be greater than 0!');

    return ($a * $h) / 2;
}

function CalcRectangleSurface($a, $b): float {
    if (!is_numeric($a)) throw new Error('Parameter a must be numeric type!');
    if ($a < 0) throw new Error('Parameter a must be greater than 0!');

    if (!is_numeric($b)) throw new Error('Parameter b must be numeric type!');
    if ($b < 0) throw new Error('Parameter b must be greater than 0!');

    return $a * $b;
}

function CalcTrapezeSurface($a, $b, $h): float {
    if (!is_numeric($a)) throw new Error('Parameter a must be numeric type!');
    if ($a < 0) throw new Error('Parameter a must be greater than 0!');

    if (!is_numeric($b)) throw new Error('Parameter b must be numeric type!');
    if ($b < 0) throw new Error('Parameter b must be greater than 0!');

    if (!is_numeric($h)) throw new Error('Parameter h must be numeric type!');
    if ($h < 0) throw new Error('Parameter h must be greater than 0!');

    return (($a + $b) * $h) / 2;
}

function CalcSurface($type, $a, $b, $h = 0): float {
    if (!is_numeric($type)) throw new Error('Parameter type must be ShapeType type!');

    switch($type) {
        case ShapeType::Rectangle: return CalcRectangleSurface($a, $b);
        case ShapeType::Trapeze: return CalcTrapezeSurface($a, $b, $h);
        case ShapeType::Triangle: return CalcTriangleSurface($a, $h);
        default: throw new Error('Unknown ShapeType!');
    }
}

echo CalcSurface(ShapeType::Rectangle, 2, 2.2).'<br>';
echo CalcSurface(ShapeType::Trapeze, 2, 2.2, 3.3).'<br>';
echo CalcSurface(ShapeType::Triangle, 2, null, '3.3').'<br>';
echo CalcSurface(ShapeType::Rectangle, -2, null, 'vvv').'<br>';