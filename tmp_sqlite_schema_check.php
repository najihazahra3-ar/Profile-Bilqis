<?php
$db = new PDO('sqlite:c:/laragon/www/test/database/database.sqlite');
$stmt = $db->query('PRAGMA table_info(portfolios)');
foreach ($stmt as $row) {
    echo implode('|', $row) . PHP_EOL;
}
