<?php

// 1. Register the Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// 2. set up the /tmp path (The only writable folder on Vercel)
$tmp = '/tmp';

// 3. Force Laravel to use /tmp for all cache files
// This bypasses the "read-only" error for bootstrap/cache
putenv("APP_PACKAGES_CACHE={$tmp}/packages.php");
putenv("APP_SERVICES_CACHE={$tmp}/services.php");
putenv("APP_CONFIG_CACHE={$tmp}/config.php");
putenv("APP_ROUTES_CACHE={$tmp}/routes.php");
putenv("APP_EVENTS_CACHE={$tmp}/events.php");

// 4. Bootstrap Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 5. Force Laravel to use /tmp for storage (logs, views, sessions)
$app->useStoragePath("{$tmp}/storage");

// 6. Ensure the storage folders exist (since /tmp is empty on every boot)
if (!is_dir("{$tmp}/storage/framework/views")) {
    mkdir("{$tmp}/storage/framework/views", 0777, true);
    mkdir("{$tmp}/storage/logs", 0777, true);
}

// 7. Handle the request
$app->handleRequest(Illuminate\Http\Request::capture());