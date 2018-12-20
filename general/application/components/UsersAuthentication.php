<?php

namespace components;

use core\SessionManipulation;
use models\UsersModel;

class UsersAuthentication {
    
    public $idLoggedUser;
    private $loginLoggedUser;
    private $_sessionManipulation;
    private $_usersModel;
    
    public function __construct() {
        $this->_sessionManipulation = new SessionManipulation();
        $this->_usersModel = new UsersModel();
        $this->setIdLoggedUser();
        $this->setLoginLoggedUser();
    }

    /**
     * log in function
     *
     * @param array $inputData
     * @return bool
     */
    public function logIn($inputData) {
        $row = $this->_usersModel->getUserData($inputData);
        if(!empty($row)){
            unset($row['password']);
            $this->_sessionManipulation->recordInformation('loggedUser', $row);
            return true;
        }
        return false;
    }

    /**
     * set in property idLoggedUser logged user id
     */
    public function setIdLoggedUser() {
        $this->idLoggedUser = $this->_sessionManipulation->getSection('loggedUser')['id'];
    }
    /**
     * set in property idLoggedUser logged user login
     */
    public function setLoginLoggedUser() {
        $this->loginLoggedUser = $this->_sessionManipulation->getSection('loggedUser')['login'];
    }

    public function ifLoggedUserIsAdmin() {
        return ($this->loginLoggedUser === 'admin');
    }

    /**
     * check is the user logged
     * 
     * @return bool
     */
    public function isUserLogged(){
        return empty($this->idLoggedUser);
    }

    /**
     * log out user
     */
    public function logOut() {
        $this->_sessionManipulation->unsetSection('loggedUser');
    }
}