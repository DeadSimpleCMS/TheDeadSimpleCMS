<?php
/**
 * settings_conf.php
 *
 * Created By monstertke
 * Date: 3/16/13
 * Time: 12:19 PM
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

$settings['base_url']           = 'http://nginx.internal';  //http://mysite.com or http://mysite.com/subdirectory
$settings['default_controller'] = 'home';       //Set to whatever the default controller name is.
$settings['php_debug']          = false;        //Set this to true during installation and development.
$settings['view_debug']         = false;         //WARNING DO NOT SET TO TRUE IN PRODUCTION ENVIORNMENT.
$settings['sql_debug']          = false;        //This either...