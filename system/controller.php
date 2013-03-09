<?php
/**
 * controller.php
 *
 * Created By monstertke
 * Date: 3/7/13
 * Time: 7:53 PM
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

class Controller {
   public $load;
   public $model;
   public $database;
   public $config;
   public $routes;

   function __construct()
   {
      $this->load       = new Load();
      $this->model      = new Model();
      $this->config     = new Configuration();
      $this->routes     = new Routes();
      $this->database   = new Database($this->config->getPgsql());

      $this->parent_construct();
   }

    function parent_construct()
    {
      //Override
    }

    function testInheritance()
    {
        echo "this is an inherited method call";
    }
}
