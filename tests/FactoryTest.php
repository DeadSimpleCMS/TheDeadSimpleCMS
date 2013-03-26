<?php
/**
 * FactoryTest.php
 *
 * Created By monstertke
 * Date: 3/25/13
 * Time: 12:17 AM
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
include 'testIncludes.php';
include 'factory.php';

class FactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var Factory */
    protected $factory;

    protected function setUp()
    {
        // Create the Array fixture.
        $this->factory = new Factory();
        var_dump($this->factory);
    }
//TODO: refactor everything.... Should have injected dependencies from the start...
    public function testFactoryReturnsRouter()
    {
        require 'router.php';
        require 'load.php';
        $v = $this->factory;
        $v->newRouter();
    }

}
