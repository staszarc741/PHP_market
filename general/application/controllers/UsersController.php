<?php
namespace controllers;

use core\Controller;

class UsersController extends Controller {


    /**
     * displays the page
     */
    public function index() {
        $errorMess = [];

        if($this->_request->checkMethod('POST')){
            $inputData = $this->_request->postData;
            $errorMess = $this->_model->checkingTheValidityOfInputDataForLogIn($inputData);
            if (empty($errorMess)){
                if($this->_usersAuthentication->logIn($inputData)){
                    if ($inputData['login'] === 'admin'){
                        $this->_response->redirect('/general/users/adminAccount/');
                    } else {
                        $this->_response->redirect('/general/users/account/');}
                } else {
                    $errorMess[] = "Wrong login or password";
                }
            }
        }
        $this->_view->setData(array('errorMess' => $errorMess));
        $this->_setView('index');
    }

    public function logout() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if($this->_request->checkMethod('POST')){
            $this->_usersAuthentication->logOut();
            $this->_response->redirect('/general/users/index');
        }
    }

    public function registration() {
        $errorMess = [];

        if($this->_request->checkMethod('POST')){
            $inputData = $this->_request->postData;

            $errorMess = $this->_model->checkingTheValidityOfInputDataForRegistration($inputData);
            if (empty($errorMess)){
                if($this->_model->signUp($inputData)){
                    if($this->_usersAuthentication->logIn($inputData)){
                        $this->_response->redirect('/general/category/categoryList/');
                    } else {
                        $this->_response->redirect('/general/users/index');
                    }
                }
            }
        }
        $this->_view->setData(array('errorMess' => $errorMess));
        $this->_setView('registration');
    }

    public function editAccount() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        $errorMess = [];
        if($this->_request->checkMethod('POST')){
            $inputData = $this->_request->postData;
            $errorMess = $this->_model->checkValidationDataForEditAccount($inputData);
            if(empty($errorMess)){
                if ($this->_model->editUserData($inputData)) {
                    $this->_model->modificationSessionData();
                    $this->_response->redirect('/general/users/account/');
                } else {
                    echo "wrong input data";
            }
            }
        }
        $this->_view->setData(array('errorMess' => $errorMess, 'menu' => $this->menu));
        $this->_setView('editAccount');
    }

    public function changePassword() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if ($this->_usersAuthentication->ifLoggedUserIsAdmin()) {
            $menu = $this->adminMenu;
        } else {
            $menu = $this->menu;
        }
        $errorMess = [];
        if($this->_request->checkMethod('POST')){
            $inputData = $this->_request->postData;
            $errorMess = $this->_model->checkValidDataForChangePass($inputData);
            if(empty($errorMess)){
                $inputData['n_password'] = sha1($inputData['n_password']);
                if ($this->_model->changePassword($inputData)) {
                    $this->_response->redirect('/general/users/adminAccount/');
                } else {
                    echo "wrong input data";
                }
            }
        }
        $this->_view->setData(array('errorMess' => $errorMess, 'menu' => $menu));
        $this->_setView('changePassword');
    }

    public function addAddress() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        $errorMess =[];
        if($this->_request->checkMethod('POST')){
            $inputData = $this->_request->postData;
            $errorMess = $this->_model->checkValidAddressData($inputData);
            if(empty($errorMess)){
                if ($this->_model->addUserAddress($inputData)) {
                    $this->_response->redirect('/general/users/addressAccount/');
                } else {
                    echo "wrong login or password";
                }
            }
        }
        $this->_view->setData(array('errorMess' => $errorMess, 'menu' => $this->menu));
        $this->_setView('addAddress');
    }

    public function addressAccount() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        $address = $this->_model->getAddressesByUserId();

        $this->_view->setData(array('address' => $address, 'menu' => $this->menu));
        $this->_setView('addressAccount');
    }
    public function account() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        $this->_view->setData(array('menu' => $this->menu));
        $this->_setView('account');
    }
    public function adminAccount() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if ($this->_usersAuthentication->ifLoggedUserIsAdmin() == false) {
            $this->_response->redirect('/general/users/account');
        }
        $this->_view->setData(array('menu' => $this->adminMenu));
        $this->_setView('adminAccount');
    }
}
