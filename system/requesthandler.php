<?php
/**
 * requesthandler.php
 *
 * Created By monstertke
 * Date: 3/20/13
 * Time: 3:33 PM
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

class RequestHandler
{
    private $_rawRoute;
    private $_filteredRoute;
    private $_requestMethod;
    private $_baseURL;
    private $_config;


    private $_class;  //Returns the class requested by the url, false if it doesn't exist.
    private $_method; //Returns the method requested by the url, false if it doesn't exist.
    private $_parameters; //Returns the parameters given by the url.
    private $_routeArray;

    function __construct()
    {
        $this->_config          = Load::getInstance()->config('settings');
        $this->_requestMethod   = &$_SERVER['REQUEST_METHOD'];
        $this->_baseURL         = $this->_config['base_url'];
        $this->_rawRoute        = &$_SERVER["REQUEST_URI"];
        $this->_filteredRoute   = $this->removeBaseUrl($this->_getURL());
        $this->removeBlankUrl();

        $this->_parameters      = $this->parseParams();
        $this->_class           = $this->parseClass();
        $this->_method          = $this->parseMethod();

        $this->_routeArray      = $this->constructRouteArray();
    }

    public function getRouteArray()
    {
        return $this->_routeArray;
    }

    public function getClass()
    {
        return $this->_class;
    }

    public function getMethod()
    {
        return $this->_method;
    }

    public function getParameters()
    {
        return $this->_parameters;
    }

    /**
     * Turn the request url into an array.
     * @return array
     */
    private function _getURL()
    {
        $route = parse_url($this->_rawRoute, PHP_URL_PATH);
        $segments = explode('/', $route);

        return $segments;
    }

    /**
     * Return Request url with base url removed.
     * @param $url
     * @return mixed
     */
    function removeBaseUrl($url)
    {
        $configBaseURL = explode('/',$this->_baseURL);
        $unfilteredRoute = $url;

        foreach($configBaseURL as $key => $value)
        {
            if(in_array($value, $unfilteredRoute))
            {$this->_filteredRoute = array_values($unfilteredRoute);
                unset($unfilteredRoute[$key]);
            }
        }
        return $unfilteredRoute;
    }

    /**
     * Remove blank spaces from URL
     */
    function removeBlankUrl()
    {
        $unfilteredRoute = $this->_filteredRoute;

        foreach($unfilteredRoute as $key => $value)
        {
            if($value == '')
            {
                unset($unfilteredRoute[$key]);
            }
        }
        $this->_filteredRoute = array_values($unfilteredRoute);
    }

    /**
     * @return bool
     */
    function parseClass()
    {
        $class = isset($this->_filteredRoute[0]) ? $this->_filteredRoute[0] : null;

        if(isset($class))
        {
            return $class;
        }
        else
        {
            return false;
        }
    }

    /**
     * @return bool
     */
    function parseMethod()
    {

        $method = isset($this->_filteredRoute[1]) ? $this->_filteredRoute[1] : null;

        if(isset($method))
        {
            return $method;
        }
        else
        {
            return false;
        }
    }

    function parseParams()
    {
        $localRoute = $this->_filteredRoute;
        $parameters = array();
        $class = isset($localRoute[0]) ? $localRoute[0] . '_controller' : null;

        if (file_exists(APPLICATION_PATH . '/controllers/'. $class . '.php'))
        {
            require_once $class . '.php';

            $method = isset($localRoute[1]) ? $localRoute[1] : null;
            if(method_exists($class, $method))
            {
                array_shift($localRoute);
                array_shift($localRoute);
                return $parameters = $localRoute;
            }
            else
            {
                array_shift($localRoute);

                return $parameters = $localRoute;
            }
        }
        else
        {
            $parameters = $localRoute;
        }
        return $parameters;
    }

    function constructRouteArray()
    {
        $constructedRoute = array();
        $c = isset($this->_class)       ? $this->_class  : null;
        $m = $this->filterMethod($this->_class, $this->_method);//isset($this->_method)      ? $this->_method : null;
        $p = isset($this->_parameters)  ? $this->_parameters : null;

        $constructedRoute['class'] =  $c;
        $constructedRoute['method'] = $m;
        $constructedRoute['params'] = $p;

        return $constructedRoute;
    }

    private function filterMethod($class, $method)
    {
        $filteredMethod = false;
        $localClass = $class . '_controller';
        if(method_exists($localClass, $method) && $method != '__construct')
        {
            return $method;
        }
        else
        {
            return $filteredMethod;
        }
    }
}