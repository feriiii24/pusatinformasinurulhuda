<?php
// Boot Laravel and inspect InformasiDokumen rows and file existence
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\InformasiDokumen;

$rows = InformasiDokumen::orderBy('id','desc')->limit(20)->get();
if ($rows->isEmpty()) {
    echo "No InformasiDokumen rows found.\n";
    exit(0);
}

foreach ($rows as $r) {
    $path = storage_path('app/' . $r->file_path);
    echo sprintf("id=%d file=%s exists=%s\n", $r->id, $r->file_path, file_exists($path) ? 'yes' : 'no');
}
