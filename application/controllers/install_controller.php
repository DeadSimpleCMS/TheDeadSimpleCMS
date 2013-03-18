<?php
/**
 * install_controller.php
 *
 * Created By monstertke
 * Date: 3/12/13
 * Time: 8:18 PM
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

class Install_controller extends Controller
{
    function __construct()
    {
        parent::__construct();

        $this->checkFiles('templates_c');
        $this->checkFiles('templates');
        $this->checkFiles('config');
        $this->checkFiles('cache');
    }

    function index()
    {
        $m = $this->load->model('installer');
        $data['page_title'] = 'Installer';


        if($_POST)
        {
            $v = new Validator();
            //TODO:Move this crap into a class or find a better library.
            if($v->string($_POST['siteName'], 'alpha|punctuation|space') && $v->string($_POST['baseUrl'], 'alpha|punctuation'))
            {
                $m->install_siteData($_POST);
            }
            else
            {
                echo "error";
            }
        }

        $data['install'] = $m->siteData();
        $this->load->view("base/header", $data);
        $this->load->view("install_index",$data);
        $this->load->view("base/footer",$data);
        //$m->install_pages();
        //echo $m->listTables();
    }

    private function checkFiles($file)
    {
        $checkPath = $GLOBALS['sitePath'] . '/application/views/smart/';
        if (!is_writable($v = $checkPath . $file))
        {
            echo $v .' is not writable or does not exist. ';
            echo '<br />';
            if (file_exists($v))
            {
                echo 'Directory permissions are currently ' . substr(sprintf('%o', fileperms($v)), -4) .
                     " they should be 0770 or 0777.";
                echo '<br />';
                echo 'To correct this error, from the command line enter...';
                echo '<br />';
                echo ' chmod 777 ' . $v;
            }
            return false;
        }
        else
        {
            if (!is_readable($v))
            {
                echo $v . ' is not readable. ';
                echo '<br />';
                if (file_exists($v))
                {
                    echo 'Directory permissions are currently ' . substr(sprintf('%o', fileperms($v)), -4) .
                        " they should be 0770 or 0777.";
                    echo '<br />';
                    echo 'To correct this error, from the command line enter...';
                    echo '<br />';
                    echo ' chmod 777 ' . $v;
                }
                return false;
            }
            return true;
        }
    }
}