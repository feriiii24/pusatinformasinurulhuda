<?php
$path = __DIR__ . '/../resources/views/dashboard.blade.php';
$bak = $path . '.bak.' . time();
if (!file_exists($path)) {
    echo "file not found: $path\n";
    exit(1);
}
copy($path, $bak);
$contents = file_get_contents($path);
$replaced = str_replace('/dasher-ui', '/dash', $contents);
if ($contents === $replaced) {
    echo "No occurrences replaced.\n";
    exit(0);
}
file_put_contents($path, $replaced);
echo "Replaced occurrences and saved backup to: $bak\n";
