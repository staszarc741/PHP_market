<?php

namespace controllers;

use core\Controller;

class CustomerController extends Controller{

  public function customerList(){
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if (!$this->_usersAuthentication->ifLoggedUserIsAdmin()) {
            $this->_response->redirect('/general/users/account');
        }
        $customerData = $this->_model->getAllCustomer();
        $this->_view->setData(array('users' => $customerData, 'menu' => $this->adminMenu));
        $this->_setView('customerList');
    }
    public function addCustomer(){
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if (!$this->_usersAuthentication->ifLoggedUserIsAdmin()) {
            $this->_response->redirect('/general/users/account');
        }
        $errorMess = [];
        if($this->_request->checkMethod('POST')){
            $inputData = $this->_request->postData;
            $errorMess = $this->_model->checkValidDataForCustomerData($inputData);
            if(empty($errorMess)){
                if ($this->_model->addCustomer($inputData) == true) {
                    $this->_response->redirect('/general/customer/customerList/');
                } else {
                    echo "wrong input data";
                }
            }
        }
        $this->_view->setData(array('errorMess' => $errorMess, 'menu' => $this->adminMenu));
        $this->_setView('addCustomer');
    }
    public function editCustomer() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if (!$this->_usersAuthentication->ifLoggedUserIsAdmin()) {
            $this->_response->redirect('/general/users/account');
        }
        $customerId = $this->_request->partOfURL['id'];
        if (empty($customerId)){
            $this->_response->redirect('/general/customer/customerList');
        }
        $customerInfo = $this->_model->getCustomerById($this->_request->partOfURL['id']);
        $errorMess = [];
        if($this->_request->checkMethod('POST')){
            $inputData = $this->_request->postData;
            $errorMess = $this->_model->checkValidDataForCustomerData($inputData);
            if(empty($errorMess)){
                if ($this->_model->editCustomer($inputData, $this->_request->partOfURL['id']) == true) {
                    $this->_response->redirect('/general/customer/customerList');
                } else {
                    echo "wrong input data";
                }
            }
        }
        $this->_view->setData(array('errorMess' => $errorMess, 'menu' => $this->adminMenu, 'customerInfo' => $customerInfo));
        $this->_setView('editCustomer');
    }
    public function deleteCustomer() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if (!$this->_usersAuthentication->ifLoggedUserIsAdmin()) {
            $this->_response->redirect('/general/users/account');
        }
        $customerId = $this->_request->partOfURL['id'];
        if (empty($customerId)){
            $this->_response->redirect('/general/customer/customerList');
        }
        $errorMess = [];
        $customerInfo = $this->_model->getCustomerById($this->_request->partOfURL['id']);
        if (empty($customerInfo)){
            $this->_response->redirect('/general/customer/customerList');
        }

        if ($this->_request->isIssetPost('yes')){
            if ($this->_model->deleteCustomer($this->_request->partOfURL['id'])){
                $this->_response->redirect('/general/customer/customerList');
            } else {
                $errorMess[] = 'wrong';
            }
        }
        if ($this->_request->isIssetPost('no')){
            $this->_response->redirect('/general/customer/customerList');
        }

        $this->_view->setData(array('errorMess' => $errorMess, 'customerInfo' => $customerInfo, 'menu' => $this->adminMenu));
        $this->_setView('deleteCustomer');
    }
}