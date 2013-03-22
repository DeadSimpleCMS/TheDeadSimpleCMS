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

    private $_class;
    private $_method;
    private $_params;

    //This construct bootstraps the entire site, all core logic stems from this point.
    function __construct()
    {

        $this->load  = Load::getInstance();
        $routeArray = new RequestHandler();
        $routeArray = $routeArray->getRouteArray();

        $this->_class   = $routeArray['class'];
        $this->_method  = $routeArray['method'];
        $this->_params  = $routeArray['params'];
        var_dump($routeArray);

        $this->callRoute();
        //$this->buildRoute();
    }

    function callRoute()
    {
        $file = $this->_class;
        $class = $file . '_controller';

        if(!$this->_class) //Defaults to false, route to home controller
        {
            $this->load->controller('home');
            $c = new Home_controller();
            call_user_func( array( $c, 'index' ) );
        }
        else //If the class has a value see if it is valid, if so load it.
        {
            if($this->load->controller($file))
            {
                $c = new $class();

                if($this->_method)
                {
                    call_user_func( array( $c, $this->_method ) );
                }
                else
                {
                    call_user_func( array( $c, 'index' ) );
                }
            }
            else //If none of the above route to the error controller and call a 404.
            {
                $this->load->controller('error');
                $c = new Error_controller();
                call_user_func( array( $c, 'index' ) );
            }
        }

    }

}
