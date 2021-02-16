<?php


namespace children\CONTROLLERS;


use children\MODELS\birthsmodel;

class arrivalController extends AbstractController
{
    public function defaultAction(){

        $workIn = $this->filterInt($this->_data['ActiveUser']->getWorkIn());

        $this->_language->load('arrival','default');
        $this->_data['children'] = birthsmodel::getAll(
                  'JOIN users ON births.created_by = users.user_id 
                        JOIN places AS places2 ON users.work_in = places2.place_id',
            'WHERE created_by != "'.$_SESSION['userID'].'" AND born_in = "'.$workIn.'" ORDER BY `births`.`dob` DESC' );
        $this->view();

    }



}