<?php

require_once ("../core/Settings.php");

spl_autoload_register('Autoloader::load');

class Autoloader
{

    public static function load($className)
    {
        foreach (Settings::$autoloadPaths as $path) {
            $file = "../".$path . "/" . $className . ".php";
            if (file_exists($file)) {
                require_once($file);
                break;
            }
        }
    }

}
