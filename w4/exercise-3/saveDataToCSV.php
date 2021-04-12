<?php declare(strict_types=1);

const SAVE_FILE = "/var/www/html/w4/exercise-3/saved/data.csv";

function SaveDataToCSV(Array $headers, Array $data): void {
    $file = fopen(SAVE_FILE, 'a');
    if (!$file) {
        die("Can't create / read file: ".error_get_last()['message']);
    }

    if (!filesize(SAVE_FILE)) {
        // Ensure correct order
        ksort($headers);
        // Write csv headers
        fputcsv($file, array_keys($headers), ';');
    }

    // Ensure correct order
    ksort($data);
    fputcsv($file, $data, ';');

    fclose($file);
}