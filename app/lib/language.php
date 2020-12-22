<?php
namespace MYMVC\LIB;


class Language
{
    private $Dictionary = [] ;
    private $view = [] ;


public function load(){
    $lang = defaultLanguage;
    if (isset($_SESSION['lang'])){
        $lang = $_SESSION['lang'];
    }

    $lang_file = language_PATH . $lang . DS . $this->view[0] . DS . $this->view[1].'.lang.php';
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
}

    public function loadLangTemp(){
        $lang = defaultLanguage;
        if (isset($_SESSION['lang'])){
            $lang = $_SESSION['lang'];
        }

        $lang_file = language_PATH . $lang . DS . 'template' . DS .'default.lang.php';
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
    }


    public function getDictionary()
    {
       return $this->Dictionary ;
    }


    public function setView($controller , $action ): void
    {
        $this->view = [$controller , $action];
    }

}