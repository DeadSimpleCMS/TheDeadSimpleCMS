<?php
/**
 * admin_controller.php
 *
 * Created By monstertke
 * Date: 3/26/13
 * Time: 8:15 PM
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

class Admin_controller extends \DeadSimpleCMS\Controller{

    function index()
    {
        /** @var $m User_Model */
        $m = $this->load->model('User');

        /** @var $n Pages_model */
        $n = $this->load->model('Pages');

        $data = $m->user_info();
        $data['pages'] = $n->getLatestPage(13);
        $data['page_title'] = 'Administration';
        $data['css_file'] = '/public/assets/css/admin.css';

        $this->load->view('base/header', $data);
        $this->load->view('admin_index', $data);
        $this->load->view('base/footer', $data);

    }
}