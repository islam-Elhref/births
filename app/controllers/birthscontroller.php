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
        if (isset($this->_data['ActiveUser']) && $this->_data['ActiveUser']->getGroupId() == 1) {
            $this->_language->load('births', 'default');
            $this->_data['children'] = birthsmodel::getbysql("SELECT * , c.place_name as 'live_in' , c2.place_name as 'const_in'
                                                                FROM births 
                                                                JOIN users ON births.created_by = users.user_id
                                                                JOIN places AS c2 ON users.work_in = c2.place_id
                                                                JOIN places as c ON births.born_in = c.place_id");

            $this->view();
        }else{
            $this->_language->load('births', 'default');
            $this->_data['children'] = birthsmodel::getAll('JOIN places ON births.born_in = places.place_id', 'where `created_by`= "' . $_SESSION['userID'] . '"');
            $this->view();
        }

    }


    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $created_by = $this->_data['ActiveUser']->getUserId();
            $new_baby = new birthsmodel($_POST['name'], $_POST['const'], $_POST['dob'], $created_by, $_POST['phone'], $_POST['born_in'], $_POST['address']);
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

    public function editAction()
    {

        if (isset($this->_params[0])) {
            $childId = abs($this->filterInt($this->_params[0]));
            $child = birthsmodel::getwhere(['child_id' => $childId, 'created_by' => $this->_data['ActiveUser']->getUserId()]);
            if ($child != false && !empty($child) && is_a($child, $this->called_class)) {

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                    $created_by = $this->_data['ActiveUser']->getUserId();
                    $new_baby = new birthsmodel($_POST['name'], $_POST['const'], $_POST['dob'], $created_by, $_POST['phone'], $_POST['born_in'], $_POST['address']);
                    $new_baby->setChildId($childId);
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

                $this->_data['child'] = $child;
                $this->_language->load('births', 'edit');
                $this->_data['places'] = placesmodel::getAll();
                $this->view();
            } else {
                $this->redirect('/births');
            }
        } else {
            $this->redirect('/births');
        }

    }

    public function deleteAction()
    {

            if (isset($_SERVER['HTTP_REFERER'])) {
                $path = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
            } else {
                $path = '';
            }

            if (isset($this->_params[0]) && $path == '/births') {

                $childId = abs($this->filterInt($this->_params[0]));
                $child = birthsmodel::getwhere(['child_id' => $childId, 'created_by' => $this->_data['ActiveUser']->getUserId()]);
                if (!empty($child) && is_a($child, $this->called_class)) {
                    try {
                        $childName = $child->getName();
                        $child->delete();

                        $this->write_msg("تم حذف المستخدم $childName بنجاح", "A User $childName has been successfully deleted");

                    } catch (PDOException $e) {
                        $this->write_msg('. هناك خطأ ما ؟ لم يتم الحذف', 'There is an error? Not Delete .');
                        $_SESSION['error'] = 'error';
                    }
                    $this->redirect('/births');

                } else {
                    $this->redirect('/births');
                }
            } else {
                $this->redirect('/births');
            }
        }
}