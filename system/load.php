<?php
/**
 * load.php
 *
 * Created By monstertke
 * Date: 3/25/13
 * Time: 11:03 PM
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


class Load
{
    private static $instance;

    function __construct()
    {
        echo __CLASS__ . ' loaded ';
    }

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $class          = __CLASS__;
            self::$instance = new $class();
        }
        return self::$instance;
    }

    function config($file_name)
    {
        $file = $file_name . '_conf.php';
        require($file);
        return $$file_name;
    }

    function view($file_name, $data = null)
    {
        $view   = new View();
        $smarty = $view->returnSmarty();

        $template = $file_name . '.tpl';
        $smarty->assign('data', $data);

        $view->loadTemplate($template, $data);
    }

    function controller($file_name)
    {
        $file = $file_name . "_controller.php";
        $path = ROOT_PATH . '/application/controllers/';
        try
        {
            if (!file_exists($path . $file))
            {
                //throw new Exception("Sorry The file {$file} doesnt exist");
                return false;
            }
            else
            {
                require_once $file;
                return true;
            }
        }
        catch (Exception $e)
        {
            echo $e;
            echo $path . '/controllers/' . $file;
        }
    }

    function model($file_name, $data = null)
    {
        $file = $file_name . "_model.php";
        $path = ROOT_PATH . '/application/models/';
        try
        {
            if (!file_exists($path . $file))
            {
                //throw new Exception("Sorry The file {$file} doesnt exist");
                return false;
            }
            else
            {
                require_once $file;
                $class = $file_name . '_model';

                return new $class;
            }
        }
        catch (Exception $e)
        {
            echo $e;
            echo $path . '/models/' . $file;
        }
    }
}
