<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

use ADYTUM\DotEnv;

// Try multiple possible locations for the .env file
$possiblePaths = [
    __DIR__ . '/../.env',                                 // Standard relative path from config dir
    dirname(__DIR__) . '/.env',                          // Project root using dirname
    realpath(__DIR__ . '/../.env'),                       // Using realpath for relative path
    str_replace('/config', '', __DIR__) . '/.env',        // Direct manipulation for forward slashes
    str_replace('\\config', '', __DIR__) . '\\.env',      // Direct manipulation for backslashes
];

$envFound = false;
foreach ($possiblePaths as $path) {
    if (file_exists($path)) {
        try {
            (new DotEnv($path))->load();
            $envFound = true;
            break;
        } catch (\Exception $e) {
            // Continue to next path if this one fails
            continue;
        }
    }
}

if (!$envFound) {
    echo 'Error: .env file not found. Please make sure it exists in the project root directory.';
    // You may want to log this error or handle it differently based on your application needs
}

define('DB_TYPE', getenv('DB_TYPE'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
