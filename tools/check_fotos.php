<?php
$db = new PDO('sqlite:' . __DIR__ . '/../database/database.sqlite');
$stmt = $db->query("SELECT id, foto_utama FROM informasi_umum WHERE foto_utama IS NOT NULL LIMIT 20");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) {
    echo "id={$r['id']} foto_utama={$r['foto_utama']}\n";
}
