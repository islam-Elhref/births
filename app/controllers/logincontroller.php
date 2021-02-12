<?php


namespace children\CONTROLLERS;


use children\LIB\filter;
use children\LIB\Helper;
use children\MODELS\UsersModel;

class logincontroller extends AbstractController
{
    use filter;
    use Helper;

    private $called_class = 'children\MODELS\UsersModel';


    public function defaultAction()
    {

        if (!isset($_SESSION['userID']) && !isset($this->_data['user']) ){
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $username = trim($this->filterString($_POST['name']));
                $password = trim($this->filterString($_POST['password']));

                if ($username == '' || $password == '') {
                    $this->write_msg('اسم المستخدم والرقم السري لا يجب ان يكون فارغ', ' username and password must be not empty');
                    $_SESSION['error'] = 'error';
                }else{
                    $user = UsersModel::getwhere(
                        ['username' => $username, 'password' => md5($password)]
                    );

                    if($user != false && !empty($user) && is_a($user, $this->called_class) ){
                        $_SESSION['userID'] = $user->getUserId();
                        $this->write_msg('تم التسجيل بنجاح', ' You have Login Successfully');
                        $this->redirect('/index');
                    }else{
                        $this->write_msg('اسم المستخدم والرقم السري غير صحيح', ' username and password is not valid');
                        $_SESSION['error'] = 'error';
                    }
                }

            }
            $this->_language->load('login', 'default');
            $this->view();
        }else{
            $this->redirect('/index');
        }

    }

}
