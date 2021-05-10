<?php declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include_once "../src/database.php";

$result = $connection->query("select * from test");

echo "Currently theare are $result->num_rows records total<br>";

while ($row = $result->fetch_assoc()) {
    echo "id: ${row["a1"]}, a1: ${row["a1"]}, a2: ${row["a2"]}, a3: ${row["a3"]} <br>";
}

$result = $connection->query("insert into `test` (`a1`, `a2`, `a3`) values ('4', '4', '4')");

echo "Added $connection->affected_rows rows<br>";