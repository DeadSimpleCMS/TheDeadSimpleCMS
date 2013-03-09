<?php

class Load {
    function view( $file_name, $data = null )
    {
       if( is_array($data) )
       {
           extract($data);
       }
       include $file_name;
    }

    function controller($file_name)
    {
        $file = $file_name . "_controller.php";
        $path = $GLOBALS["sitePath"] . '/application/controllers/';
        try
        {
            if(!file_exists($path . $file))
            {
                //throw new Exception("Sorry The file {$file} doesnt exist");
                return false;
            }
            else
            {
                require_once $file;
                return true;
            }
        }
        catch(Exception $e)
        {
            echo $e;
            echo $path . '/controllers/' . $file;
        }
    }
}



