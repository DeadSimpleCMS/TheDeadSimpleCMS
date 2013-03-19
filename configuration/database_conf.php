<?php
/**
 * database_conf.php
 *
 * Created By monstertke
 * Date: 3/16/13
 * Time: 12:25 PM
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

// **** PostgreSql ****
$database['driver']     = 'pgsql';              // sqlite,mysql or pgsql
$database['host']       = 'postgres.internal';  // localhost, database.host.com, database.host
$database['port']       = '5432';               // MySql default = 3306, PostgreSql = 5432, SQLite = '' (blank or null)
$database['database']   = 'laravel';            // MySql & PostgreSql = 'dbname', SQLite = '/database/dbname.txt'
$database['username']   = 'laravel';            // DB Engine Username
$database['password']   = 'secure99';           // DB Engine Password
$database['charset']    = 'utf8';               // Default charset - recommend 'utf8'
$database['prefix']     = '';                   // Database table prefix ie. 'deadSimple_'
$database['schema']     = 'public';             // Usually 'public';

// **** SQLite *******
//$database['driver']     = 'sqlite';              // sqlite,mysql or pgsql
//$database['database']   = $GLOBALS['sitePath'] . '/database/deadsimple.txt'; //Do not alter $GLOBALS['sitePath']
//$database['username']   = 'laravel';            // DB Engine Username
//$database['password']   = 'secure99';           // DB Engine Password
