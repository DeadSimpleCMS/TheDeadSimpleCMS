<?php
/**
 * install_system.php
 *
 * Created By monstertke
 * Date: 3/18/13
 * Time: 4:11 PM
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

class Install_system
{
    public $load;
    public $db;
    function __construct()
    {
        $this->load = Load::getInstance();
        echo "Welcome to the DeadSimpleCMS system installer." . '<br>';
        if($this->checkFileChecker())
        {
            $this->db = new Install_database();
            if(!$this->db->installDataExists())
            {
                if($this->db->install_links() && $this->db->install_siteData() && $this->db->install_pages())
                {
                    $this->db->listTables();
                }
                echo "Database defaults installed.";
            }
            else
            {
                echo 'Database Defaults already installed, please proceed to yoursite.com/admin';
            }
        }

    }

    private function checkFiles($file)
    {
        $checkPath = ROOT_PATH;
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
            echo '<pre>' . $v . ' --- Is readable and writable by the web server user.</pre>' .'<br>';
            return true;
        }
    }

    function checkFileChecker() //Lol
    {
        if($this->checkFiles('/application/views/smart/templates_c') &&
            $this->checkFiles('/application/views/smart/templates') &&
            $this->checkFiles('/application/views/smart/configs') &&
            $this->checkFiles('/application/views/smart/cache') &&
            $this->checkFiles('/database'))
        {
            echo "System directories seem to be in order." . '<br>';
            return true;
        }
        else
        {
            echo "Sorry, there has been an unexpected error." . '<br>';
            echo "Please ensure that all system files are in the correct locations." . '<br>';
            echo "If this error persists please open an issue on..";
            echo "<a href=\"https://github.com/DeadSimpleCMS/TheDeadSimpleCMS/issues\">Github</a>";
            return false;
        }
    }
}