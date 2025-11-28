<?php

// 1. Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// 2. Bootstrap Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 3. FORCE Storage Path to /tmp (Vercel's only writable folder)
// This prevents "Permission Denied" errors for logs/cache/views
$app->useStoragePath('/tmp/storage');

// 4. Handle the Request
$app->handleRequest(Illuminate\Http\Request::capture());