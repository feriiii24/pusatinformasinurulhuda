<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\InformasiDokumen;

$id = $argv[1] ?? null;
if (! $id) {
    echo "Usage: php scripts/inspect_doc.php <id>\n";
    exit(1);
}

$d = InformasiDokumen::find($id);
if (! $d) {
    echo "No InformasiDokumen with id=$id\n";
    exit(0);
}

echo "id={$d->id}\n";
echo "file_path={$d->file_path}\n";
echo "exists=". (file_exists(storage_path('app/'.$d->file_path)) ? 'yes' : 'no') ."\n";
print_r($d->toArray());
