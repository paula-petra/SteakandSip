<?php


class Input
{

   
    public static function exists($type = 'POST')
    {
        switch ($type)
        {
            case 'POST':
                // DO SOMETHING FOR POST
                return (!empty($_POST)) ? true : false;
                break;
            case 'GET':
                // DO SOMETHING FOR GET
                return (!empty($_GET)) ? true : false;
                break;
            default:
                return false;
                break;
        }
    }

    public static function get($item)
    {
        if (isset($_POST[$item]))
        {
            return filter_var($_POST[$item]);
            
        }
        elseif (isset($_GET[$item]))
        {
            return filter_var($_GET[$item]);
        }
        
    }
}
