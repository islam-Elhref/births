<?php


namespace children\CONTROLLERS;


use children\LIB\filter;
use children\LIB\Helper;
use children\MODELS\birthsmodel;
use children\MODELS\placesmodel;
use PDOException;

class BirthsController extends AbstractController
{
    use Helper;
    use filter;

    private $called_class = 'children\MODELS\birthsmodel';


    public function defaultAction()
    {
        $this->_language->load('births', 'default');
        $this->_data['children'] = birthsmodel::getAll('JOIN places ON births.born_in = places.place_id', 'where `created_by`= "' . $_SESSION['userID'] . '"');
        $this->view();
    }


    public function addAction(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $created_by = $this->_data['ActiveUser']->getUserId();
            $new_baby = new birthsmodel($_POST['name'], $_POST['const'] , $_POST['dob'] , $created_by , $_POST['phone'] , $_POST['born_in'] , $_POST['address']   );
            if ($new_baby->check_input_empty('place_name') === true) {
                try {
                    $new_baby->save();
                    $this->write_msg('تم حفظ المولود بنجاح', 'A New baby has been successfully added');

                } catch (PDOException $e) {
                    $this->write_msg('. هناك خطأ ؟ لم يتم الحفظ', 'There is an error ? Not saved .');
                    $_SESSION['error'] = 'error';
                }
            }
            $this->redirect('/births');
        }
        $this->_data['places'] = placesmodel::getAll();
        $this->_language->load('births', 'Add');
        $this->view();
    }

    public function editAction() {
        if (isset($this->_data['ActiveUser']) && $this->_data['ActiveUser']->getGroupId() == 1) {

            if (isset($this->_params[0])) {
                $userId = abs($this->filterInt($this->_params[0]));
                $user = UsersModel::getByPK($userId);
                if ($user != false && !empty($user) && is_a($user, $this->called_class)) {

                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                        $password = '';
                        if ($_POST['password'] === $user->getPassword()) {
                            $password = $user->getPassword();
                        } else {
                            $password = md5($_POST['password']);
                        }
                        $new_user = new UsersModel($_POST['name'], $password, $_POST['phone'], $_POST['work_in'], $_POST['group']);
                        $new_user->setUserId($user->getUserId());
                        if ($new_user->check_input_empty('place_name') === true) {
                            try {
                                $new_user->save();
                                $this->write_msg('تم حفظ المستخدم بنجاح', 'A New user has been successfully added');

                            } catch (PDOException $e) {
                                $this->write_msg('. هناك خطأ ؟ لم يتم الحفظ', 'There is an error ? Not saved .');
                                $_SESSION['error'] = 'error';
                            }
                        }
                        $this->redirect('/users');
                    }

                    $this->_language->load('users', 'edit');
                    $this->_data['places'] = placesmodel::getAll();
                    $this->_data['user'] = $user;
                    $this->view();
                } else {
                    $this->redirect('/users');
                }
            } else {
                $this->redirect('/users');
            }

        } else {
            $this->redirect('/users');
        }

    }

    public function deleteAction()
    {
        if (isset($this->_data['ActiveUser']) && $this->_data['ActiveUser']->getGroupId() == 1) {

            if (isset($_SERVER['HTTP_REFERER'])) {
                $path = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
            } else {
                $path = '';
            }

            if (isset($this->_params[0]) && $path == '/users') {

                $usersId = abs($this->filterInt($this->_params[0]));
                $user = UsersModel::getByPK($usersId);
                if (!empty($user) && is_a($user, $this->called_class)) {
                    try {
                        $usersName = $user->getUsername();
                        $user->delete();
                        if ($user->getUserId() == $this->_data['ActiveUser']->getUserId()) {
                            session_unset();
                            session_destroy();
                            $this->_data['ActiveUser'] = '';
                        } else {
                            $this->write_msg("تم حذف المستخدم $usersName بنجاح", "A User $usersName has been successfully deleted");
                        }
                    } catch (PDOException $e) {
                        $this->write_msg('. هناك خطأ ما ؟ لم يتم الحذف', 'There is an error? Not Delete .');
                        $_SESSION['error'] = 'error';
                    }
                    $this->redirect('/users');

                } else {
                    $this->redirect('/users');
                }
            } else {
                $this->redirect('/users');
            }
        }
    }
}