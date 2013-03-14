<?php
/**
 * database.php
 *
 * Created By monstertke
 * Date: 3/7/13
 * Time: 7:53 PM
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
class Database
{
    private $config;
    private $settings;
    private $db;

    function __construct()
    {
        require_once 'rb.php';
        $this->config = new Configuration();
        $this->settings = $this->config->getSettings();


        switch($this->settings['database'])
        {
            case 'postgres':
                $v = $this->db = $this->config->getPgsql();
                R::setup("pgsql:host={$v["host"]};dbname={$v["database"]}","{$v["username"]}","{$v["password"]}");
                break;
            case 'mysql':
                $v = $this->db = $this->config->getMysql();
                R::setup("mysql:host={$v["host"]};dbname={$v["database"]}","{$v["username"]}","{$v["password"]}");
                break;
            case 'sqlite':
                $v = $this->db = $this->config->getSqlite();
                R::setup("sqlite:{$v["database"]}","{$v["username"]}","{$v["password"]}");
                break;
            default:
                echo "THere is a problem with your config file, please check the value of the \"database\" array value
                in /configuration/configuration.php";
        }










        if($this->settings['sql_debug'])
        {
            R::debug(true);
        }
    }

    function listTables()
    {
        return R::$writer->getTables();
    }

}
