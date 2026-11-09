<?php
// One-off script to dump InformasiUmum record by id
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\InformasiUmum;
$id = $argv[1] ?? 2;
$item = InformasiUmum::with('user')->find($id);
if (!$item) {
    echo "NOT FOUND\n";
    exit(0);
}

echo json_encode($item->toArray(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), "\n";
