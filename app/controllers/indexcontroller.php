<?php


namespace children\CONTROLLERS;


class indexcontroller extends AbstractController
{

    public function defaultAction(){
        $this->_language->load('index','default');
        $this->view();
    }

}