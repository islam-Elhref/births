<?php


namespace MYMVC\CONTROLLERS;


use MYMVC\MODELS\UsersModel;

class UsersGroupsController extends AbstractController
{

    public function defaultAction(){
        $this->_language->load('usersgroups','default');
        $this->_data['users'] = UsersModel::getAll();
        $this->view();
    }

}