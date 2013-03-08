<?php
/**
 * router.php
 *
 * Created By monstertke
 * Date: 3/7/13
 * Time: 7:38 PM
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
class Router
{
    private $route;

    function __construct()
    {
        $this->route = $this->getURL();
        //call matching extended class in this case home.
        if($this->returnMethod($this->route))
        {
            $file = $this->returnMethod($this->route);
            $class = $file . '_controller';
            require_once $file . '_controller.php'; //TODO: This need to be handled by the loader class. and handle no matches on the method call.

            new $class;

        }
        else
        {
            require_once "home_controller.php";
            new Home_controller(); //TODO: This needs to be cleaned up.
        }

    }

    function getURL()
    {
        $route = parse_url($_SERVER["REQUEST_URI"]);
        $segments = explode('/', $route["path"]);
        //var_dump($segments);
        return $segments;
    }

    function returnMethod($r)
    {
        return $r[1];
    }

    function returnParams($r)
    {
        $arrayCount = array_shift($r);

        return $r;
    }
}
