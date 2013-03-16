<?php
/**
 * installer_model.php
 *
 * Created By monstertke
 * Date: 3/12/13
 * Time: 8:08 PM
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

class Installer_model extends Model
{
    function install_pages()
    {
        $pages = R::dispense('pages');

        $pages->content ="Welcome to DeadSimpleCMS!";
        $pages->position ="1";
        $pages->owner ="1";
        $pages->published ="1";
        $pages->created = R::isoDateTime();
        $pages->modified = R::isoDateTime();

        R::store($pages);

    }

    function install_links()
    {
        $links = R::dispense('links');
        $links->url = '/';
        $links->linkName = 'home';
        $links->owner = "1";
    }

    function install_siteData($data)
    {
        $site = R::load("site", 1);
        $site->name = $data["siteName"];
        $site->baseurl = $data["baseUrl"];
        $site->created = R::isoDateTime();
        $site->modified = R::isoDateTime();

        R::store($site);
    }

    function siteData()
    {
        return R::load("site", 1);
    }

    function info()
    {
        phpinfo();
    }
}