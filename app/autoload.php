<?php

declare(strict_types=1);

// Start session
session_start();

// Timezone
date_default_timezone_set('UTC');

mb_internal_encoding('UTF-8');

// Include the helper functions.
require __DIR__.'/functions.php';

// Global configuration array.
$config = require __DIR__.'/config.php';

// Database connection.
$pdo = new PDO($config['database_path']);
