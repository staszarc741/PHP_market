<?php

namespace controllers;

use core\Controller;
use models\ProductModel;

class ProductController extends Controller
{

    /**
     * @var ProductModel
     */
    protected $_model;

    public function productList() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        $productData = $this->_model->getAllProducts();

        $this->_view->setData(array('product' => $productData, 'menu' => $this->adminMenu));
        $this->_setView('productList');
    }
    public function addProduct(){
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if (!$this->_usersAuthentication->ifLoggedUserIsAdmin()) {
            $this->_response->redirect('/general/users/account');
        }
        $errorMess = [];
        if($this->_request->checkMethod('POST')){
            $inputData = $this->_request->postData;
            $errorMess = $this->_model->checkValidDataForProductData($inputData);
            if(empty($errorMess)){
                if ($this->_model->addProduct($inputData) == true) {
                    $this->_response->redirect('/general/product/productList/');
                } else {
                    echo "wrong input data";
                }
            }
        }
        $this->_view->setData(array('errorMess' => $errorMess, 'menu' => $this->adminMenu));
        $this->_setView('addProduct');
    }
    public function editProduct(){
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if (!$this->_usersAuthentication->ifLoggedUserIsAdmin()) {
            $this->_response->redirect('/general/users/account');
        }

        $productId=$this->_request->partOfURL['id'];
        if (empty($productId)){
            $this->_response->redirect('/general/product/productList/');
        }
        $productInfo = $this->_model->getProductById($this->_request->partOfURL['id']);
        $errorMess = [];
        if($this->_request->checkMethod('POST')){
            $inputData = $this->_request->postData;
            $errorMess = $this->_model->checkValidDataForProductData($inputData);
            if(empty($errorMess)){
                if ($this->_model->editProduct($inputData, $this->_request->partOfURL['id']) == true) {
                    $this->_response->redirect('/general/product/productList/');
                } else {
                    echo "wrong input data";
                }
            }
        }

        $this->_view->setData(array('errorMess' => $errorMess, 'menu' => $this->adminMenu, 'productInfo' => $productInfo));
        $this->_setView('editProduct');
    }
    public function deleteProduct(){
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        if (!$this->_usersAuthentication->ifLoggedUserIsAdmin()) {
            $this->_response->redirect('/general/users/account');
        }
        $errorMess = [];
        $productId = $this->_request->partOfURL['id'];
        if (empty($productId)){
            $this->_response->redirect('/general/product/productList/');
        }
        $productInfo = $this->_model->getProductById($this->_request->partOfURL['id']);
        if (empty($productInfo)){
            $this->_response->redirect('/general/product/productList/');
        }
        if ($this->_request->isIssetPost('yes')){
            if ($this->_model->deleteProduct($this->_request->partOfURL['id'])){
                $this->_response->redirect('/general/product/productList/');
            }else{
                echo 'wrong';
            }
        }
        if ($this->_request->isIssetPost('no')){
            $this->_response->redirect('/general/product/productList/');
        }
        $this->_view->setData(array('errorMess' => $errorMess, 'menu' => $this->adminMenu, 'productInfo' => $productInfo));
        $this->_setView('deleteProduct');
    }
}