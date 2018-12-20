<?php

namespace core;

use components\Response;
use components\Request;
use components\UsersAuthentication;

class Controller {

    protected $_model;
    /**
     * @var View
     */
    protected $_view;
    protected $_action;
    protected $_baseName;
    /**
     * @var UsersAuthentication
     */
    protected $_usersAuthentication;
    /**
     * @var Response
     */
    protected $_response;
    /**
     * @var Request
     */
    protected $_request;
    public  $menu = array('Особистий кабінет'=>'/general/users/account',
        'Редагувати особистий кабінет'=>'/general/users/editAccount',
        'Адресна книга'=>'/general/users/addressAccount',
        'Змінити пароль'=>'/general/users/changePassword');

    public $adminMenu = array(
        'Особистий кабінет' => '/general/users/adminAccount',
        'Заміна паролю' => '/general/users/changePassword',
        'Список категорій' => '/general/category/categoryList',
        'Список продуктів' => '/general/product/productList',
        'Список користувачів' => '/general/customer/customerList');


    /**
     * Controller constructor.
     * @param string $action
     */
    public function __construct ($action) {
        $this->_action = $action;
        $this->_baseName = $this->_generateBaseName(static::class);
        $this->_model = $this->_setModel();
        $this->_view = new View();
        $this->_usersAuthentication = new UsersAuthentication();
        $this->_response = new Response();
        $this->_request = new Request();
    }
    
    /**
     * generate base name
     *
     * @param string $className
     * @return mixed
     */
    protected function _generateBaseName($className) {
        $model = str_replace('Controller', "", $className);
        return str_replace('controllers\\', '', $model);
    }

    /**
     * creates an object of class model
     *
     * @return mixed
     */
    protected function _setModel() {
        $modelName = 'models\\' . $this->_baseName . 'Model';
        return new $modelName();
    }

    /**
     * creates an object of class view
     *
     * @param string $viewName
     * @return View
     */
    protected function _setView($viewName) {
        $this->_view->setTemplate(strtolower($this->_baseName) . '/' . $viewName);
        return $this->_view->generate();
    }
}
