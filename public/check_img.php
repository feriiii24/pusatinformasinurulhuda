<?php
header('Content-Type: application/json');
$rel = 'dash/images/svg/zoom.svg';
$path = __DIR__ . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $rel);
$out = [
    'rel' => $rel,
    'path' => $path,
    'file_exists' => file_exists($path),
    'realpath' => file_exists($path) ? realpath($path) : null,
    'document_root' => isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : null,
    'request_uri' => isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null,
    'script_filename' => isset($_SERVER['SCRIPT_FILENAME']) ? $_SERVER['SCRIPT_FILENAME'] : null,
];
echo json_encode($out);
