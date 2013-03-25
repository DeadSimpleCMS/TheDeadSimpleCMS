<?php
/**
 * testIncludes.php
 *
 * Created By monstertke
 * Date: 3/25/13
 * Time: 12:37 AM
 *
 * Copyright (c) 2013 monstertke
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated 
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the 
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to  
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the 
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE 
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR 
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, 
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE 
 * SOFTWARE.
 */

define('PUBLIC_PATH', getcwd());
chdir('../');
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