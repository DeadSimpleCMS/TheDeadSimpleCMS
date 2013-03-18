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
    public static $route;

    private $load;

    //This construct bootstraps the entire site, all core logic stems from this point.
    function __construct()
    {
        //Get the current url as array
        $this->route = $this->getURL();
        $this->load  = Load::getInstance();

        $this->buildRoute();
    }

    function getURL()
    {
        $route = parse_url($_SERVER["REQUEST_URI"]);
        $segments = explode('/', $route["path"]);
        //var_dump($segments);
        return $segments;
    }

    function returnMethod()
    {
        return $this->route[1];
    }

    function returnParams()
    {
        //Suppress warning so it can return false;
        if(@$this->route[2])
        {
            return $this->route[2];
        }
        else
        {
            return false;
        }
    }

    function buildRoute()
    {
        if($this->returnMethod())
        {
            $file = $this->returnMethod();
            $class = $file . '_controller';

            //returns true if it finds a matching class to load.
            if($this->load->controller($file))
            {
                $c = new $class();

                if($this->returnParams())
                {
                    call_user_func( array( $c, $this->returnParams() ) );
                }
                else
                {
                    call_user_func( array( $c, 'index' ) );
                }
            }
            else
            {
                $this->load->controller('error');
                $c = new Error_controller();
                call_user_func( array( $c, 'index' ) );
            }

        }
        else
        {
            $this->load->controller('home');
            $c = new Home_controller();
            call_user_func( array( $c, 'index' ) );
        }
    }

}
