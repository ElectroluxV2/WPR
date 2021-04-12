<?php declare(strict_types=1);

const SAVE_FILE = "/var/www/html/w4/exercise-3/saved/data.csv";

$file = fopen(SAVE_FILE, 'r');
if (!$file) {
    die("Can't create / read file: ".error_get_last()['message']);
}

// Read headers
$headers = fgetcsv($file, 0, ';');

echo "<table>";
echo "<tr>";

foreach ($headers as $header) {
    echo "<th>$header</th>";
}

echo "</tr>";

while (!feof($file)) {
    echo "<tr>";

    $reservationData = fgetcsv($file, 0, ';');

    if (!$reservationData) continue;

    foreach ($reservationData as $item) {
        echo "<td>$item</td>";
    }

    echo "</tr>";
}

echo "</table>";

fclose($file);