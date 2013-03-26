<?php
/**
 * BootTest.php
 *
 * Created By monstertke
 * Date: 3/25/13
 * Time: 11:10 PM
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
use DeadSimpleCMS\Boot;
use DeadSimpleCMS\Load;
use DeadSimpleCMS\Factory;

include 'testIncludes.php';
require 'load.php';
require 'boot.php';
require 'factory.php';

class BootTest extends PHPUnit_Framework_TestCase {


    protected $boot;

    protected function setUp()
    {
        $this->boot = new Boot();
        $this->boot->setLoad(new Load);
    }

    public function testBootReturnsLoader()
    {

        $g = $this->boot->getLoad();
        $this->assertEquals($g, new Load());
    }

}
