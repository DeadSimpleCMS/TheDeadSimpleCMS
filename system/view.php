<?php
/**
 * view.php
 *
 * Created By monstertke
 * Date: 3/9/13
 * Time: 10:29 AM
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

class View
{
    public $smarty;
    private $path;
    private $settings;

    function __construct()
    {
        $this->path = ROOT_PATH . '/application/views/smart/';
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir($this->path . 'templates/');
        $this->smarty->setCompileDir($this->path . 'templates_c/');
        $this->smarty->setConfigDir($this->path .'configs/');
        $this->smarty->setCacheDir($this->path . 'cache/');
        $this->settings = Load::getInstance();
        $this->settings = $this->settings->config('settings');

        //configuration/configuration.php $settings['view_debug']
        if($this->settings['view_debug'])
        {
            $this->smarty->debugging = true;
        }
    }

    function returnSmarty()
    {
        return $this->smarty;
    }

    function loadTemplate($template = null)
    {
        $this->smarty->display($template);
    }
}
