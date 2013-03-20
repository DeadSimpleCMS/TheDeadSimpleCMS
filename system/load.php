<?php


class Load {

    private static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }
        return self::$instance;
    }

    function config($file_name)
    {
        $file = $file_name . '_conf.php';
        require($file);
        return $$file_name;
    }

    function view( $file_name, $data = null )
    {
        $view = new View();
        $smarty = $view->returnSmarty();

        $template = $file_name . '.tpl';
        $smarty->assign('data', $data);

        $view->loadTemplate($template, $data);
    }

    function controller($file_name)
    {
        $file = $file_name . "_controller.php";
        $path = ROOT_PATH . '/application/controllers/';
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

    function model($file_name, $data = null)
    {
        $file = $file_name . "_model.php";
        $path = ROOT_PATH . '/application/models/';
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
                $class = $file_name . '_model';

                return new $class;
            }
        }
        catch(Exception $e)
        {
            echo $e;
            echo $path . '/models/' . $file;
        }
    }
}



