<?php

$publicPath = getcwd();
chdir($_SERVER['DOCUMENT_ROOT'] . "/..");
$sitePath = getcwd();
chdir($publicPath);

$paths = array(
    $sitePath . '/application/views',
    $sitePath . '/application/controllers',
    $sitePath . '/application/models',
    $sitePath . '/system',
    $sitePath . '/application',
    $sitePath . '/configuration',
    $sitePath . '/lib',
    get_include_path()
);

set_include_path(implode(PATH_SEPARATOR, $paths));
unset($paths);

// Display errors in production mode
ini_set('display_errors', 1);

// let's get started
require_once 'core.php';
