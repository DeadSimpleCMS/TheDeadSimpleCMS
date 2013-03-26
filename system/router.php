<?php
/**
 * router.php
 *
 * Created By monstertke
 * Date: 3/26/13
 * Time: 7:46 PM
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


class Router {

    public static $route;

    /** @var Load */
    private $load;
    /** @var RequestHandler */
    private $request;

    private $_class;
    private $_method;
    private $_params;

    /**
     * @param RequestHandler $request
     */
    function __construct(RequestHandler $request)
    {

        $this->load  = Load::getInstance();
        $routeArray = $request;
        $this->request = $routeArray->getRouteArray();

        $this->_class   = $this->request['class'];
        $this->_method  = $this->request['method'];
        $this->_params  = $this->request['params'];
        var_dump($this->request);

        $this->callRoute();
    }
//TODO: FILTER THE PARAMETERS
    function callRoute()
    {
        $file = $this->_class;
        $class = $file . '_controller';

        if(!$this->_class) //Defaults to false, route to home controller
        {
            $this->load->controller('home');
            $c = new Home_controller();
            call_user_func_array( array( $c, 'index' ), $this->_params );
        }
        else //If the class has a value see if it is valid, if so load it.
        {
            if($this->load->controller($file))
            {
                $c = new $class();

                if($this->_method )
                {
                    call_user_func_array( array( $c, $this->_method ), $this->_params );
                }
                else
                {
                    call_user_func_array( array( $c, 'index' ), $this->_params );
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