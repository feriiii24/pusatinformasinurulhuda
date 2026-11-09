<?php
try {
    $db = new PDO('sqlite:' . __DIR__ . '/../database/database.sqlite');
    $stmt = $db->query("SELECT name FROM sqlite_master WHERE type='table'");
    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($tables as $t) {
        echo $t['name'] . PHP_EOL;
    }
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
}
