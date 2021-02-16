<?php


namespace children\CONTROLLERS;


use children\MODELS\placesmodel;
use children\MODELS\UsersModel;

class indexcontroller extends AbstractController
{

    public function defaultAction()
    {
        $users = UsersModel::getbysql("SELECT
                                    u1.username,
                                    places.place_name,
                                    COUNT(births.child_id) AS 'mybirths',
                                    ( SELECT
                                    COUNT(births.child_id) AS otherbirths
                                    FROM
                                        births
                                    WHERE u1.user_id != births.created_by and births.born_in = u1.work_in ) AS otherbirths     
                                FROM
                                    users u1
                                JOIN places ON places.place_id = u1.work_in
                                LEFT OUTER JOIN births ON u1.user_id = births.created_by
                                GROUP BY
                                    u1.user_id
                                    ");

        $countitem = UsersModel::getonebysql('SELECT
                                                (
                                                SELECT COUNT(users.user_id) FROM users
                                                ) AS count_users,
                                                (
                                                    SELECT COUNT(places.place_id) FROM places
                                                ) AS count_places,
                                                (
                                                    SELECT COUNT(births.child_id) FROM births
                                                ) AS count_births');

        $this->_data['countAll'] = $countitem;
        $this->_data['users'] = $users;
        $this->_language->load('index', 'default');
        $this->view();
    }

}


//SELECT
//    u1.username,
//    places.place_name,
//    COUNT(births.child_id) AS 'mybirths',
//    ( SELECT
//    COUNT(births.child_id) AS otherbirths
//    FROM
//        births
//    WHERE u1.user_id != births.created_by and births.born_in = u1.work_in and  month(births.dob) = 2 ) AS otherbirths
//
//FROM
//    users u1
//JOIN places ON places.place_id = u1.work_in
//LEFT OUTER JOIN births ON u1.user_id = births.created_by
//WHERE month(births.dob) = 2
// WHERE births.dob BETWEEN '2021-1-1' and LAST_DAY('2021-1-1')
//GROUP BY
//    u1.user_id

