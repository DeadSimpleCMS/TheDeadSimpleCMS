<?php
/**
 * admin_controller.php
 *
 * Created By monstertke
 * Date: 3/7/13
 * Time: 11:48 PM
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
class Admin_controller extends Controller
{

    function index()
    {
        /** @var $m User_Model */
        $m = $this->load->model('user');

        /** @var $n Pages_Model */
        $n = $this->load->model('pages');

        $data['userInfo']   = $m->user_info();
        $data['pages']      = $n->getLatestPage(13);
        $data['page_title'] = 'Administration';
        $data['css_file']   = '/public/assets/css/admin.css';
        $data['arrayTest']  = array('derp', 'herp', 'burp');

        $this->load->view('base/header', $data);
        $this->load->view('admin_index', $data);
        $this->load->view('base/footer', $data);

    }
}
