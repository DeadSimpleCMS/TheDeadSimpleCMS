<?php
/**
 * install_database.php
 *
 * Created By monstertke
 * Date: 3/18/13
 * Time: 4:51 PM
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

class Install_database extends Database
{
    function __construct()
    {
        parent::__construct();
        $this->installDataExists();
    }

    function install_links()
    {
        $linkData = array(
            0 => array(
                'url'       => '/home',
                'linkname'  => 'Home',
                'order'     => '1',
                'location'  => '1',
                'owner'     => '1',

            ),
            1 => array(
                'url'       => '/admin',
                'linkname'  => 'Admin',
                'order'     => '2',
                'location'  => '1',
                'owner'     => '1',

            ),
            2 => array(
                'url'       => '/install',
                'linkname'  => 'Install',
                'order'     => '3',
                'location'  => '1',
                'owner'     => '1',

            ),
        );

        foreach($linkData as $k)
        {
            $links = R::dispense('links');
            $links->url = $k['url'];;
            $links->linkName = $k['linkname'];
            $links->order = $k['order'];
            $links->location = $k['location']; //1 == navbar
            $links->owner = $k['owner'];
            $links->created = R::isoDateTime();
            $links->modified = R::isoDateTime();

            R::store($links);

        }
        $this->installDataExists('links', true);
        return true;
    }

    function install_siteData()
    {
        $site = R::load("site", 1);
        $site->name = 'DeadSimpleCMS';
        $site->baseurl = $_SERVER['HTTP_HOST'];
        $site->created = R::isoDateTime();
        $site->modified = R::isoDateTime();

        R::store($site);

        $this->installDataExists('site', true);
        return true;
    }

    function install_pages()
    {
        $pageData = array(
            0 => array(
                'content'   => 'This is an example of some page content.',
                'title'     => 'Awesome',
                'slug'      => 'awesome',
                'container' => 'div',
                'class'     => '',
                'cssid'     => '',
                'position'  => '1',
                'owner'     => '1',
                'published' => '1',

            ),
            1 => array(
                'content'   => 'This could be a long post or other page information',
                'title'     => 'DeadSimpleCMS',
                'slug'      => 'deadsimplecms',
                'container' => 'div',
                'class'     => '',
                'cssid'        => '',
                'position'  => '1',
                'owner'     => '1',
                'published' => '1',

            ),
            2 => array(
                'content'   => 'This is a further example of some dynamic content',
                'title'     => 'Dynamic Content',
                'slug'      => 'dynamic-content',
                'container' => 'div',
                'class'     => '',
                'cssid'     => '',
                'position'  => '1',
                'owner'     => '1',
                'published' => '1',

            ),
        );

        foreach($pageData as $k)
        {
            $pages = R::dispense('pages');
            $pages->content     = $k['content'];
            $pages->title       = $k['title'];
            $pages->slug        = $k['slug'];
            $pages->container   = $k['container'];
            $pages->class       = $k['class'];
            $pages->cssid       = $k['cssid'];
            $pages->position    = $k['position'];
            $pages->owner       = $k['owner'];
            $pages->published   = $k['published'];
            $pages->created = R::isoDateTime();
            $pages->modified = R::isoDateTime();

            R::store($pages);
        }
        $this->installDataExists('pages', true);
        return true;
    }

    function installDataExists($key = null, $value = null)
    {
        if(!file_exists('installer/store'))
        {
            $installCheck = array(
                            'links' => false,
                            'site'=> false,
                            'pages' => false,
            );

            file_put_contents('installer/store', serialize($installCheck));
            return false;
        }
        else
        {
            $installCheck = unserialize(file_get_contents('installer/store'));
            if(!is_null($key))
            {
                $installCheck[$key] = $value;
            }

            file_put_contents('installer/store', serialize($installCheck));

            if($installCheck['links'] && $installCheck['site'] && $installCheck['pages'])
            {
                return true;
            }
            else
            {
                return false;
            }
        }



    }
}