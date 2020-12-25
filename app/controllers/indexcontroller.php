<?php


namespace MYMVC\CONTROLLERS;


class IndexController extends AbstractController
{

    public function defaultAction(){
        $this->_language->load('Index','default');
        $this->view();
    }

}