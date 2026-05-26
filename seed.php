#!/usr/bin/env php
<?php

$basePath = __DIR__;
require $basePath . '/vendor/autoload.php';

$app = require_once $basePath . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);

// Run migrations
echo "Running migrations...\n";
$kernel->call('migrate:fresh', ['--quiet' => true]);

// Run seeds
echo "Seeding database...\n";
$kernel->call('db:seed', ['--quiet' => true]);

echo "Database refreshed successfully!\n";
