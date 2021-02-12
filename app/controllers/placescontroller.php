<?php

namespace children\CONTROLLERS;

use children\LIB\filter;
use children\LIB\Helper;
use children\MODELS\placesmodel;
use PDOException;

class placesController extends AbstractController
{
    use filter;
    use Helper;

    private $called_class = 'children\MODELS\placesmodel';

    public function defaultAction()
    {
        $this->_language->load('places', 'default');
        $this->_data['places'] = placesmodel::getAll();
        $this->view();
    }

    public function editAction()
    {
        if (isset($this->_data['ActiveUser']) && $this->_data['ActiveUser']->getGroupId() == 1) {

            if (isset($this->_params[0])) {
                $place_id = abs($this->filterInt($this->_params[0])); // param id privilege
                $place = placesmodel::getByPK($place_id); // object from privilege model
                if (!empty($place) && is_a($place, $this->called_class)) {

                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                        $new_place = new placesmodel($_POST['name']);
                        $new_place->setPlaceId($place->getPlaceId());
                        if ($new_place->check_input_empty() === true) {
                            try {
                                $new_place->save();
                                $this->write_msg('تم تعديل الوحده بنجاح', 'A place has been successfully Edit');

                            } catch (PDOException $e) {
                                $this->write_msg('. اسم الوحده موجود مسبقا ؟ لم يتم الحفظ', 'place name is exist ? Not saved .');

                                $_SESSION['error'] = 'error';
                            }
                        }
                        $this->redirect('/places');
                    }
                    $this->_language->load('places', 'edit'); // language file edit
                    $this->_data['place'] = $place;
                    $this->view();
                } else {
                    $this->redirect('/places');
                }
            } else {
                $this->redirect('/places');
            }
        } else {
            $this->redirect('/index');
        }
    }

    public function addAction()
    {
        if (isset($this->_data['ActiveUser']) && $this->_data['ActiveUser']->getGroupId() == 1) {

            $this->_language->load('places', 'add');

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                $new_place = new placesmodel($_POST['name']);

                if ($new_place->check_input_empty() === true) {
                    try {
                        $new_place->save();
                        $this->write_msg('تم حفظ الوحده بنجاح', 'A New place has been successfully added');

                    } catch (PDOException $e) {
                        $this->write_msg('. اسم الوحده موجود مسبقا ؟ لم يتم الحفظ', 'place name is exist ? Not saved .');

                        $_SESSION['error'] = 'error';
                    }
                }
                $this->redirect('/places');
            }

            $this->view();
        } else {
            $this->redirect('/index');
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

            if (isset($this->_params[0]) && $path == '/places') {

                $place_id = abs($this->filterInt($this->_params[0]));
                $place = placesmodel::getByPK($place_id);
                if (!empty($place) && is_a($place, $this->called_class)) {

                    try {
                        $place->delete();
                        $this->write_msg('تم حذف الوحده بنجاح', 'A place has been successfully deleted');

                    } catch (PDOException $e) {
                        $this->write_msg('. هناك خطأ ما ؟ لم يتم الحذف', 'There is an error? Not Delete .');
                        $_SESSION['error'] = 'error';
                    }
                    $this->redirect('/places');

                } else {
                    $this->redirect('/places');
                }
            } else {
                $this->redirect('/places');
            }
        } else {
            $this->redirect('/places');
        }
    }


}