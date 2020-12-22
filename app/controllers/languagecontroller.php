<?php
namespace MYMVC\CONTROLLERS;


use MYMVC\LIB\Helper;

class LanguageController extends AbstractController
{
    use Helper;

    public function defaultAction(){

        if (isset($_SESSION['lang'])){
            if ($_SESSION['lang'] == 'ar'){
                $_SESSION['lang'] = 'en';
            }else{
                $_SESSION['lang'] = 'ar';
            }
        }else{
            $_SESSION['lang'] = 'en';
        }

        $path = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '\index';

        $this->redirect($path);
    }


}