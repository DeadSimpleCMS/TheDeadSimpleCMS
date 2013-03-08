<?php

$paths = array(
    '/usr/share/nginx/www' . '/application/views',
    '/usr/share/nginx/www' . '/application/controllers',
    '/usr/share/nginx/www' . '/system',
    '/usr/share/nginx/www' . '/application',
    '/usr/share/nginx/www' . '/configuration',
    '/usr/share/nginx/www' . '/lib',
    get_include_path()
);

set_include_path(implode(PATH_SEPARATOR, $paths));
unset($paths);

// Display errors in production mode
ini_set('display_errors', 1);

// let's get started
require_once 'core.php';
