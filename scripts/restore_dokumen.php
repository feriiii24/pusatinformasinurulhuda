<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\InformasiDokumen;
use Illuminate\Support\Facades\Storage;

$rows = InformasiDokumen::all();
$created = 0;
foreach ($rows as $r) {
    $path = $r->file_path;
    $full = storage_path('app/' . $path);
    if (! file_exists($full)) {
        // ensure directory exists
        $dir = dirname($full);
        if (! is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $content = "%PDF-1.4\n%âãÏÓ\n1 0 obj\n<< /Type /Catalog /Pages 2 0 R >>\nendobj\n2 0 obj\n<< /Type /Pages /Kids [3 0 R] /Count 1 >>\nendobj\n3 0 obj\n<< /Type /Page /Parent 2 0 R /MediaBox [0 0 200 200] /Contents 4 0 R >>\nendobj\n4 0 obj\n<< /Length 44 >>\nstream\nBT /F1 24 Tf 10 100 Td (Restored: {$r->id}) Tj ET\nendstream\nendobj\ntrailer\n<< /Root 1 0 R >>\n%%EOF";
        file_put_contents($full, $content);
        $created++;
        echo "Restored: $path\n";
    } else {
        echo "Exists: $path\n";
    }
}

echo "Total created: $created\n";
