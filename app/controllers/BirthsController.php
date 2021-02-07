<?php


namespace children\CONTROLLERS;


class BirthsController extends AbstractController
{
    public function defaultAction(){
        $this->_language->load('users','default');
        $this->view();
    }
}