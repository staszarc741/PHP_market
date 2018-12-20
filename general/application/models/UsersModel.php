<?php
namespace models;

use core\Model;
use core\Database;

class UsersModel extends Model {

    /**
     * get user data by value from post
     *
     * @param array $inputData
     * @return mixed
     */
    public function getUserData($inputData) {
        $encryptedPassword = sha1($inputData['password']);
        $sql = 'select * from users where login=\'' . $inputData['login'] . '\' and password=\'' . $encryptedPassword . '\' limit 1';
        $result = $this->_db->connection->query($sql);
        return $result->fetch_assoc();
    }

    /**
     * sign up user
     *
     * @param $inputData
     * @return mixed
     */
    public function signUp($inputData) {
        $encryptedPassword = sha1($inputData['password']);
        $sql = 'insert into users (login, password, email, firstname, lastname, phone) values (\'' . $inputData['login'] . '\', \'' . $encryptedPassword . '\', \'' . $inputData['email'] . '\', \'' . $inputData['firstname'] . '\', \'' . $inputData['lastname'] . '\', \'' . $inputData['phone'] . '\')';
        return $this->_db->connection->query($sql);
    }

    /**
     * checking the validity of input data for logIn
     *
     * @param array $inputData
     * @return string
     */
    public function checkingTheValidityOfInputDataForLogIn($inputData) {
        if (empty($inputData['login']) || empty($inputData['password'])){
            return array("Enter all fields");
        }
        return array();
    }

    /**
     * checking the validity of input data for registration
     *
     * @param $inputData
     * @return array
     */
    public function checkingTheValidityOfInputDataForRegistration($inputData) {
        $errorMess = [];
        if (empty($inputData['login']) || empty($inputData['password']) || empty($inputData['email'])){
            $errorMess[] = 'Enter all fields';
        }
        $row = $this->_getDataByLogin($inputData['login']);
        if ($inputData['login'] == $row['login']) {
            $errorMess[] = 'Chose another login';
        }
        if (!$this->_validate->validateMinLengthForString($inputData['password'])){
            $errorMess[] = 'Password must be at least 8 characters';
        }
        if (!$this->_validate->regularExpressionsForEmail($inputData['email'])){
            $errorMess[] = 'Email isn\'t valid';
        }
        return $errorMess;
    }

    /**
     * get data from 'users' by login
     *
     * @param $login
     * @return mixed
     */
    private function _getDataByLogin($login) {
        $sql = 'select * from users where login=\'' . $login . '\'';
        $result = $this->_db->connection->query($sql);
        return $result->fetch_assoc();
    }
    public function checkPassword($password,$confirmPassword){
        if ($password == $confirmPassword){
            return '';
        }else{
            return 'invalid password confirmation';
        }
    }
    public function editUserData($inputData) {
        $sql = 'UPDATE users SET email=\'' . $inputData['email'] . '\', firstname=\'' .
            $inputData['firstname'] . '\', lastname=\'' . $inputData['lastname'] . '\', phone=\'' . $inputData['phone'] . '\' WHERE
login=\'' . $_SESSION['loggedUser']['login'] . '\'';
        $result = $this->_db->connection->query($sql);
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    public function addUserAddress($inputData) {
        $userId = $this->getUserIdByLogin($_SESSION['loggedUser']['login']);
        $address = $this->getAddressesByUserId();
        if (empty($address)){
            $insert = 'insert into addresses (user_id, street, city, country)
values (\'' . $userId . '\', \'' . $inputData['street'] . '\', \'' .
                $inputData['city'] . '\', \'' . $inputData['country'] . '\')';
            return $this->_db->connection->query($insert);
        } else {
            $update = 'update addresses set street = \'' . $inputData['street'] .
                '\', city = \'' . $inputData['city'] . '\', country = \'' . $inputData['country'] .
                '\' where user_id = \'' . $userId . '\'';
            return $this->_db->connection->query($update);

        }
    }
    public function getUserIdByLogin($userLogin) {
        $select = 'SELECT id FROM users WHERE login=\'' . $userLogin . '\'';
        $result = $this->_db->connection->query($select);
        $rows = $result->fetch_assoc();
        if (!empty($rows)) {
            return $rows['id'];
        }
        return array();
    }

    public function getAddressesByUserId() {
        $userId = $this->getUserIdByLogin($_SESSION['loggedUser']['login']);
        $select = 'SELECT * FROM addresses WHERE user_id=\'' . $userId . '\'';
        $result = $this->_db->connection->query($select);
        $rows = $result->fetch_assoc();
        if (!empty($rows)) {
            return $rows;
        }
        return array();
    }
    public function getUserInfoByLogin() {
        $sql = 'SELECT * FROM users WHERE login=\'' . $_SESSION['loggedUser']['login'] . '\'';
        $result = $this->_db->connection->query($sql);
        return $result->fetch_assoc();
    }

    function changePassword($inputData) {
        $sql = 'UPDATE users SET password=\'' . $inputData['n_password'] . '\' WHERE
login=\'' . $_SESSION['loggedUser']['login'] . '\'';
        return $this->_db->connection->query($sql);
    }


    public function getUserPasswordByLogin($userLogin) {
        $select = 'SELECT password FROM users WHERE login=\'' . $userLogin . '\'';
        $result = $this->_db->connection->query($select);
        $rows = $result->fetch_assoc();
        if (!empty($rows)) {
            return $rows['password'];
        }
        return array();
    }
    public function checkValidationDataForEditAccount($inputData){
        $errorMess = [];
        if (empty($inputData['firstname'] || $inputData['lastname'] || $inputData['phone'] || $inputData['pass'] || $inputData['email'] || $inputData['login'])){
            $errorMess[] = 'Усі поля обовязкові для заповнення';
        }
        if (!empty($this->isValidEmail($inputData['email']))){
            $errorMess[] = $this->isValidEmail($inputData['email']);
        }
        return $errorMess;
    }
    public function isValidEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return '';
        }else{
            return 'email is invalid';
        }
    }
    public function checkValidDataForChangePass($inputData){
    $errorMess = [];
    if (empty($inputData['c_password'] || $inputData['n_password'] || $inputData['rn_password'])){
        $errorMess [] = 'Усі поля обовязкові для заповнення';
    }
 $sha_c_password = sha1($inputData['c_password']);
    if ($sha_c_password !== $this->getUserPasswordByLogin($_SESSION['loggedUser']['login'])){
    $errorMess[] = 'Поточний пароль не співпадає';
    }
    if (strlen($inputData['n_password']) < 8){
    $errorMess[] = 'Пароль повинен мати більше 8 символів';
    }
    if ($inputData['n_password'] !== $inputData['rn_password']){
    $errorMess[] = 'Перевірка нового паролю не співпала';
    }
    return $errorMess;
    }
    public function modificationSessionData() {
        $newData = $this->getUserInfoByLogin();
        unset($newData['password']);
        unset($_SESSION['loggedUser']);
        $_SESSION['loggedUser'] = $newData;
    }
    public function checkValidAddressData($inputData){
        $errorMess = [];
        if (empty($inputData['street'] || $inputData['town'] || $inputData['city'])){
            $errorMess []= 'Усі поля обовязкові для заповнення';
        }
        return $errorMess;
    }
}
