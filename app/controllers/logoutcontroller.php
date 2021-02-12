<?php
namespace children\CONTROLLERS;


use children\LIB\Helper;

class logoutController extends AbstractController
{
    use Helper;

    public function defaultAction(){

        if (isset($_SERVER['HTTP_REFERER']) && isset($_SESSION['userID'])){
            session_unset();
            session_destroy();
            $this->_data['user'] = '';
            $this->redirect('/login');
        }
    }


}