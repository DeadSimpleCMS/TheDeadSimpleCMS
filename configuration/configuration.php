<?php
/**
 * configuration.php
 *
 * Created By monstertke
 * Date: 3/7/13
 * Time: 7:58 PM
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
class Configuration
{
    /*
     * General configuration settings.
     */
    public $settings = array(
        'database'              => 'postgres',  //Values are: postgres, mysql, or sqlite.
        'base_url'              => '',          //The base URL og the installation.
        'default_controller'    => 'home',      //Set to whatever the default controller name is.
        'php_debug'             => false,       //Set this to true during installation and development.
        'sql_debug'             => false,       //WARNING DO NOT SET TO TRUE IN PRODUCTION ENVIORNMENT.
    );

    /**
     * Database connection settings.
     */
    public $sqlite = array(
        'driver'   => 'sqlite',
        'database' => '/database/deadsimple.txt',
        'username' => 'laravel',
        'password' => 'secure99',
    );

    public $mysql = array(
        'driver'   => 'mysql',
        'host'     => 'postgres.internal',
        'database' => 'laravel',
        'username' => 'laravel',
        'password' => 'secure99',
        'charset'  => 'utf8',
        'prefix'   => '',
        'schema'   => 'public',
    );

    public $pgsql = array(
        'driver'   => 'pgsql',
        'host'     => 'postgres.internal',
        'database' => 'laravel',
        'username' => 'laravel',
        'password' => 'secure99',
        'charset'  => 'utf8',
        'prefix'   => '',
        'schema'   => 'public',
    );

    /*
     * DO NOT EDIT ANYTHING BELOW THIS POINT!!!
     */

    public function getSettings()
    {
        return $this->settings;
    }

    public function getSqlite()
    {
        return $this->sqlite;
    }

    public function getMysql()
    {
        return $this->mysql;
    }

    public function getPgsql()
    {
        return $this->pgsql;
    }

}
