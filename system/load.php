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

    function controller($file_name, $data = null)
    {
        if( is_array($data) )
        {
            extract($data);
        }
        include $file_name;
    }
}



