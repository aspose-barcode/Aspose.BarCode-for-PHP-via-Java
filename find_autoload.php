<?php

// Possible locations of vendor/autoload.php
$autoloadPaths = [
    __DIR__ . '/autoload.php',  // Installed via Composer in a project
    __DIR__ . '/../../autoload.php',  // Installed via Composer in a project
    __DIR__ . '/../../../autoload.php',  // Installed via Composer in a project
    __DIR__ . '/../../../../autoload.php',  // Installed via Composer in a project
    __DIR__ . '/../../../../../vendor/autoload.php', // If the structure is deeper
    __DIR__ . '/vendor/autoload.php', // For local development
];

// Try to find and load vendor/autoload.php
foreach ($autoloadPaths as $autoloadPath) {
    if (file_exists($autoloadPath)) {
        require_once $autoloadPath;
        return;
    }
}

// If not found, throw an error
throw new Exception("autoload.php not found! Run `composer install`.");
