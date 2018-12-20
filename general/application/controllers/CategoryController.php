<?php

namespace controllers;

use core\Controller;
use models\CategoryModel;

class CategoryController extends Controller {

    /**
     * @var CategoryModel
     */
    protected $_model;
    /**
     * displays the page
     */
    public function categoryList() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if (!$this->_usersAuthentication->ifLoggedUserIsAdmin()) {
            $this->_response->redirect('/general/users/account');
        }
        $categoryData = $this->_model->getAllCategories();

        $this->_view->setData(array('categories' => $categoryData, 'menu' => $this->adminMenu));
        $this->_setView('categoryList');
    }

    public function addCategory() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if (!$this->_usersAuthentication->ifLoggedUserIsAdmin()) {
            $this->_response->redirect('/general/users/account');
        }
        $errorMess = [];
        if($this->_request->checkMethod('POST')){
            $inputData = $this->_request->postData;
            $errorMess = $this->_model->checkValidDataForCategoryData($inputData);
            if(empty($errorMess)){
                if ($this->_model->addCategory($inputData) == true) {
                    $this->_response->redirect('/general/category/categoryList/');
                } else {
                    echo "wrong input data";
                }
            }
        }
        $this->_view->setData(array('errorMess' => $errorMess, 'menu' => $this->adminMenu));
        $this->_setView('addCategory');
    }

    public function editCategory() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if (!$this->_usersAuthentication->ifLoggedUserIsAdmin()) {
            $this->_response->redirect('/general/users/account');
        }
        $categoryId = $this->_request->partOfURL['id'];
        if (empty($categoryId)){
            $this->_response->redirect('/general/category/categoryList');
        }
//        print_r($this->_request->partOfURL['id']);
        $categoryInfo = $this->_model->getCategoryById($this->_request->partOfURL['id']);
        $errorMess = [];
        if($this->_request->checkMethod('POST')){
            $inputData = $this->_request->postData;
            $errorMess = $this->_model->checkValidDataForEditCategoryData($inputData);
            if(empty($errorMess)){
                if ($this->_model->editCategory($inputData, $this->_request->partOfURL['id']) == true) {
                    $this->_response->redirect('/general/category/categoryList/');
                } else {
                    echo "wrong input data";
                }
            }
        }
        $this->_view->setData(array('errorMess' => $errorMess, 'menu' => $this->adminMenu, 'categoryInfo' => $categoryInfo));
        $this->_setView('editCategory');
    }

    public function deleteCategory() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if (!$this->_usersAuthentication->ifLoggedUserIsAdmin()) {
            $this->_response->redirect('/general/users/account');
        }
        $categoryId = $this->_request->partOfURL['id'];
        if (empty($categoryId)){
            $this->_response->redirect('/general/category/categoryList');
        }
        $errorMess = [];
        $categoryInfo = $this->_model->getCategoryById($this->_request->partOfURL['id']);
        if (empty($categoryInfo)){
            $this->_response->redirect('/general/category/categoryList');
        }

        if ($this->_request->isIssetPost('yes')){
            if ($this->_model->deleteCategory($this->_request->partOfURL['id'])){
                $this->_response->redirect('/general/category/categoryList');
            } else {
                $errorMess[] = 'wrong';
            }
        }
        if ($this->_request->isIssetPost('no')){
            $this->_response->redirect('/general/category/categoryList');
        }

        $this->_view->setData(array('errorMess' => $errorMess, 'categoryInfo' => $categoryInfo, 'menu' => $this->adminMenu));
        $this->_setView('deleteCategory');
    }

}