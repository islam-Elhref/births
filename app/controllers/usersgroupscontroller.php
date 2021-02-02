<?php


namespace MYMVC\CONTROLLERS;


use MYMVC\LIB\filter;
use MYMVC\LIB\Helper;
use MYMVC\MODELS\UsersGroupsModel;
use PDOException;

class UsersGroupsController extends AbstractController
{

    use filter;
    use Helper;

    private $called_class = 'MYMVC\MODELS\UsersGroupsModel';


    public function defaultAction()
    {
        $this->_language->load('usersgroups', 'default');
        $this->_data['usersgroups'] = UsersGroupsModel::getAll();
        $this->view();
    }

    public function editAction()
    {
        if (isset($this->_params[0])) {
            $usersGroupId = abs($this->filterInt($this->_params[0]));
            $usersGroup = UsersGroupsModel::getByPK($usersGroupId);
            if ($usersGroup != false && !empty($usersGroup) && is_a($usersGroup, $this->called_class)) {

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                    $groupnameBefore =$usersGroup->getGroupName();
                    $groupnameAfter = $_POST['name'];
                    $GroupAfterEdit = new UsersGroupsModel($groupnameAfter);
                    $GroupAfterEdit->setGroupId($usersGroupId);

                    if ($GroupAfterEdit->check_input_empty() === true){
                        try {
                            $GroupAfterEdit->save();
                            $this->write_msg(" تم تعديل مجموعة مستخدمين من $groupnameBefore الي $groupnameAfter "
                                ,       "users Group has been Edit from $groupnameBefore to $groupnameAfter " );
                        }catch (PDOException $e){
                            $this->write_msg('. اسم المجموعة موجود مسبقا ؟ لم يتم الحفظ', 'Users Group name is exist ? Not saved .');
                            $_SESSION['error'] = 'error';
                        }
                    }
                    $this->redirect('/usersgroups');
                }

                $this->_language->load('usersgroups', 'edit');
                $this->_data['usergroup'] = $usersGroup;
                $this->view();
            } else {
                $this->redirect('/usersgroups');
            }
        } else {
            $this->redirect('/usersgroups');
        }

    }

    public function addAction()
    {
        $this->_language->load('usersgroups', 'add');
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $new_users_group = new UsersGroupsModel($_POST['name']);

            if ($new_users_group->check_input_empty() === true) {
                try {
                    $new_users_group->save();
                    $this->write_msg('تم حفظ المجموعة بنجاح', 'A New users group has been successfully added');

                } catch (PDOException $e) {
                    $this->write_msg('. اسم مجموعة المستخدمين موجود مسبقا ؟ لم يتم الحفظ', 'users group name is exist ? Not saved .');

                    $_SESSION['error'] = 'error';
                }
            }
            $this->redirect('/usersgroups');
        }

        $this->view();
    }

    public function deleteAction()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $path = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
        } else {
            $path = '';
        }

        if (isset($this->_params[0]) && $path == '/usersgroups') {

            $usersGroupId = abs($this->filterInt($this->_params[0]));
            $usersGroup = UsersGroupsModel::getByPK($usersGroupId);
            if (!empty($usersGroup) && is_a($usersGroup, $this->called_class)) {
                try {
                    $usersGroupName = $usersGroup->getGroupName();
                    $usersGroup->delete();
                    $this->write_msg("تم حذف مجموعة المستخدمين $usersGroupName بنجاح", "A Users Group $usersGroupName has been successfully deleted");
                } catch (PDOException $e) {
                    $this->write_msg('. هناك خطأ ما ؟ لم يتم الحذف', 'There is an error? Not Delete .');
                    $_SESSION['error'] = 'error';
                }
                $this->redirect('/usersgroups');

            } else {
                $this->redirect('/usersgroups');
            }
        } else {
            $this->redirect('/usersgroups');
        }
    }



}