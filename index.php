<?php

define('PUBLIC_PATH', getcwd() . '/public');

define('ROOT_PATH', getcwd());

chdir(PUBLIC_PATH);

define('APPLICATION_PATH', ROOT_PATH . '/application');
define('SYSTEM_PATH', ROOT_PATH . '/system');
define('LIBRARY_PATH', ROOT_PATH . '/lib');
define('CONFIG_PATH', ROOT_PATH . '/configuration');

$paths = array(
    CONFIG_PATH,
    SYSTEM_PATH,
    APPLICATION_PATH,
    APPLICATION_PATH . '/views',
    APPLICATION_PATH . '/controllers',
    APPLICATION_PATH . '/models',
    LIBRARY_PATH,
    LIBRARY_PATH . '/Smarty/libs',
    LIBRARY_PATH . '/Smarty/libs/plugins',
    LIBRARY_PATH . '/Smarty/libs/sysplugins',
    get_include_path()
);

set_include_path(implode(PATH_SEPARATOR, $paths));
unset($paths);

// Display errors in production mode
ini_set('display_errors', 1);

// let's get started TODO:Make sure to change this back.
if(false)//file_exists(PUBLIC_PATH . '/installer'))
{
    require_once PUBLIC_PATH . '/installer/index.php';
}
else
{

    require_once 'core.php';
}