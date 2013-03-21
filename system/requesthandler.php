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

    function __construct()
    {
        $this->_config = Load::getInstance()->config('settings');
        $this->_requestMethod = &$_SERVER['REQUEST_METHOD'];
        $this->_baseURL = $this->_config['base_url'];
        $this->_rawRoute = &$_SERVER["REQUEST_URI"];
        $this->_filteredRoute = $this->removeBaseUrl($this->_getURL());
        $this->removeBlankUrl();

        var_dump($this->_filteredRoute);
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
            {
                unset($this->_filteredRoute[$key]);
            }
        }
        return $unfilteredRoute;
    }

    /**
     * Remove blank spaces from URL
     */
    function removeBlankUrl()
    {
        $unfilteredRoute = &$this->_filteredRoute;

        foreach($unfilteredRoute as $key => $value)
        {
            if($value == '')
            {
                unset($unfilteredRoute[$key]);
            }
        }
        $this->_filteredRoute = $unfilteredRoute;
    }
}