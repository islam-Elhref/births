<?php
namespace children\LIB;

class Autoload
{

    public static function autoload($classname){
        $classname = strtolower(str_replace('children', '', $classname));
        $classname = str_replace('\\', DS, $classname);
        $path = APP_PATH . $classname . '.php' ;
        if (file_exists($path)){
            require_once $path;
        }
    }


}
spl_autoload_register(__NAMESPACE__ . '\Autoload::autoload');