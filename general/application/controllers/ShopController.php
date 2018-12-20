<?php
/**
 * Created by PhpStorm.
 * User: User1
 * Date: 12.06.2017
 * Time: 17:34
 */

namespace controllers;

use core\Controller;
use models\ShopModel;

class ShopController extends Controller
{

    /**
     * @var ShopModel
     */
    protected $_model;

    public function index() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        $categories = $this->_model->getAllCategories();

        $this->_view->setData(array('categories' => $categories));
        $this->_setView('index');
    }
    public function productList() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        $categoryId = $this->_request->partOfURL['id'];
        if (empty($categoryId)){
            $this->_response->redirect('/general/category/categoryList');
        }
        $products = $this->_model->getProductsByCategoryId($categoryId);
        $this->_view->setData(array('products' => $products));
        $this->_setView('productList');
    }
    public function productPage() {
        if ($this->_usersAuthentication->isUserLogged()){
            $this->_response->redirect('/general/users/index');
        }
        $productId = $this->_request->partOfURL['id'];
        if (empty($productId)){
            $this->_response->redirect('/general/category/categoryList');
        }
        $productInfo = $this->_model->getProductById($this->_request->partOfURL['id']);
        $this->_view->setData(array('productInfo' => $productInfo));
        $this->_setView('productPage');
    }


}