<?php

namespace models;

use core\Model;
use core\SessionManipulation;

class ProductModel extends Model
{
    private $_sessionManipulation;

    public function __construct() {
        parent::__construct();
        $this->_sessionManipulation = new SessionManipulation();
    }

    public function getAllProducts(){
        $sql = 'select * from products';
        $result= $this->_db->connection->query($sql);
        $res=[];
        while($rows = $result->fetch_assoc()){
            $res[]=$rows;
        }
        return $res;
    }
 public function addProduct($inputData){
     $sql='insert into products (product_name, category_name, sku, quantity, price) values (\'' . $inputData['product_name'] . '\', \'' . $inputData['category_name'] . '\' , \'' . $inputData['sku'] . '\' , \'' . $inputData['quantity'] . '\',\'' . $inputData['price'] . '\')';
     return $this->_db->connection->query($sql);
 }
 public  function editProduct($inputData, $product_id){
     $sql = 'update products set 
              product_name=\'' . $inputData['product_name'] . '\', category_name=\'' . $inputData['category_name'] . '\', sku=\'' . $inputData['sku'] . '\', quantity=\'' . $inputData['quantity'] . '\' , price=\'' . $inputData['price'] . '\' 
          where id=\'' . $product_id .'\'';
     return $this->_db->connection->query($sql);
    }
 public function deleteProduct($product_id){
     $sql='delete FROM  products where id= \'' . $product_id . '\'';
     return $this->_db->connection->query($sql);
 }
 public function getProductById($product_id){
     $sql ='select * from products where id=\''. $product_id . '\'';
     $result= $this->_db->connection->query($sql);
     if (!empty($result)) {
         return $result->fetch_assoc();
     }
     return array();
 }
  public  function checkValidDataForProductData($inputData){
      $errorMess=[];
      if (empty($inputData['product_name']) || empty($inputData['category_name']) || empty($inputData['sku']) || empty($inputData['quantity']) || empty($inputData['price'])){
          $errorMess [] = 'Усі поля обовязкові для заповнення';
      }
      return $errorMess;
  }

}