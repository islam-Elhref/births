<?php
namespace MYMVC\LIB;


class Language
{
    private $Dictionary = [] ;



public function load($controller , $action){
    $lang = defaultLanguage;
    if (isset($_SESSION['lang'])){
        $lang = $_SESSION['lang'];
    }

    $lang_file = language_PATH . $lang . DS . $controller . DS . $action .'.lang.php';
    if (file_exists($lang_file)){
        require_once $lang_file;
        if (isset($_) && !empty($_)){
            foreach ($_ as $key => $value){
                if (!key_exists($key , $this->Dictionary )){
                    $this->Dictionary[$key] = $value;
                }
            }
            return $this->Dictionary;
        }
    }else{
        trigger_error('the language file does not exists', E_USER_ERROR);
    }
    return true;
}



    public function getDictionary()
    {
       return $this->Dictionary ;
    }



}