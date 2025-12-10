<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: noPage");

require '../frame_libs/DotEnv.php';
require '../config/paths.php';
// Database configuration is included but connection only happens when needed
require '../config/database.php';

require '../third_party/vendor_jwt/autoload.php';
require '../frame_libs/JsonEncode.php';

// Define pages or paths that should skip database connection entirely
$skipDatabasePages = [
    '/academic',
    '/admission',
    '/chairman',
    '/contact',
    '/events',
    '/videos',
    '/why_choose',
	'/home',
	'/page404'
    // Add more pages that don't need database here
];

// Auto-loader for framework libraries
function my_autoloader($class) {
	if (file_exists("../frame_libs/". $class .".php")) {
		include "../frame_libs/". $class .".php";
	}
}

spl_autoload_register('my_autoloader');

new Router();