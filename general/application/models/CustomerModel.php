<?php
namespace models;


use core\Model;
use core\SessionManipulation;

class CustomerModel extends Model
{
    private $_sessionManipulation;

    public function __construct() {
        parent::__construct();
        $this->_sessionManipulation = new SessionManipulation();
    }

//    your customer's functions
    public function GetAllCustomer(){
        $sql = 'select * from users';
        $result= $this->_db->connection->query($sql);
        $res=[];
        while($rows = $result->fetch_assoc()){
            $res[]=$rows;
        }
        return $res;
    }
    public function checkValidDataForCustomerData($inputData){
        $errorMess=[];
        if (empty($inputData['login'] || $inputData['email'] || $inputData['firstname'] || $inputData['lastname'] || $inputData['phone'])){
            $errorMess [] = 'Усі поля обовязкові для заповнення';
        }
        return $errorMess;
    }
    public  function editCustomer($inputData, $customer_id){
        $sql = 'update users set login=\'' . $inputData['login'] . '\' ,
    email=\'' . $inputData['email'] . '\' ,
    firstname=\'' . $inputData['firstname'] . '\' ,
    lastname=\'' . $inputData['lastname'] . '\' ,
    phone=\'' . $inputData['phone'] . '\' where id=\'' . $customer_id .'\'';
        return $this->_db->connection->query($sql);
    }
    public function getUsersById($customer_id){
        $sql ='select * from users where id=\''. $customer_id . '\'';
        $result= $this->_db->connection->query($sql);
        if (!empty($result)){
            return $result->fetch_assoc();
        }
        return array();
    }
    public function deleteCustomer($customer_id){
        $sql='delete FROM  users where id= \'' . $customer_id . '\'';
        return $this->_db->connection->query($sql);
    }
    public function addCustomer($inputData){
        $sql='insert into users (login, email, firstname, lastname, phone) values (\'' . $inputData['login'] . '\', \'' . $inputData['email'] . '\' , \'' . $inputData['firstname'] . '\' , \'' . $inputData['lastname'] . '\',\'' . $inputData['phone'] . '\')';
        return $this->_db->connection->query($sql);
    }

    public function getCustomerById($customer_id) {
        $sql ='select * from users where id=\''. $customer_id . '\'';
        $result= $this->_db->connection->query($sql);
        if (!empty($result)) {
            return $result->fetch_assoc();
        }
        return array();
    }
}   