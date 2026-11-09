<?php
// Development helper: redirect directory requests to Laravel's /dokumen route.
// This avoids the built-in server serving static files inside public/dokumen
// and ensures Laravel's route handling is used.
header('Location: /dokumen', true, 302);
exit;
