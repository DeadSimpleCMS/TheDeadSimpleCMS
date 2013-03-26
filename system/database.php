<?php
/**
 * database.php
 *
 * Created By monstertke
 * Date: 3/26/13
 * Time: 7:44 PM
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

namespace DeadSimpleCMS;


class Database {

    private $settings;
    private $db;

    function __construct()
    {
        require_once 'rb.php';
        $loader         = Load::getInstance();
        $this->settings = $loader->config('settings');
        $this->db       = $loader->config('database');

        switch ($this->db['driver'])
        {

            case 'pgsql':
                $v = $this->db;
                R::setup("pgsql:host={$v["host"]};dbname={$v["database"]}", "{$v["username"]}", "{$v["password"]}");
                break;
            case 'mysql':
                $v = $this->db;
                R::setup("mysql:host={$v["host"]};dbname={$v["database"]}", "{$v["username"]}", "{$v["password"]}");
                break;
            case 'sqlite':
                $v = $this->db;
                R::setup("sqlite:{$v["database"]}", "{$v["username"]}", "{$v["password"]}");
                break;
            default:
                echo "THere is a problem with your configs file, please check the value of the \"database\" array value
                in /configuration/configuration.php";
        }

        if ($this->settings['sql_debug'])
        {
            R::debug(true);
        }
    }

    function listTables()
    {
        $db = R::$writer->getTables();
        echo '<br>';
        foreach ($db as $k => $v)
        {
            echo 'Table ' . '"' . $v . '"' . ' loaded and initialized.' . '<br>';
        }
    }
}