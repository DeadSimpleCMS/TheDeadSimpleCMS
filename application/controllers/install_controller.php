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
    function index()
    {
        $m = $this->load->model('installer');
        $data['page_title'] = 'Installer';

        $this->load->view("base/header", $data);
        $this->load->view("install_index");
        $this->load->view("base/footer");

        if($_POST)
        {
            $format = array('format' => VALIDATE_NUM . VALIDATE_SPACE . VALIDATE_ALPHA_UPPER . VALIDATE_ALPHA_LOWER . VALIDATE_PUNCTUATION);
            //TODO:Move this crap into a class or find a better library.
            if(Validate::string($_POST['siteName'], $format)
                && Validate::string($_POST['baseUrl'], $format))
            {
                $m->install_siteData($_POST);
            }
            else
            {
                echo "error";
            }
            var_dump($_POST);
        }

        //$m->install_pages();
        //echo $m->listTables();
    }
}