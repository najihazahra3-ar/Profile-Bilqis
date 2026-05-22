<?php
$db = new PDO('sqlite:c:/laragon/www/test/database/database.sqlite');
$stmt = $db->query('SELECT * FROM migrations');
foreach ($stmt as $row) {
    echo implode('|', $row) . PHP_EOL;
}
