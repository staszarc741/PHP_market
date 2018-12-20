<?php

namespace models;

use core\Model;
use core\SessionManipulation;

class CategoryModel extends Model {

    private $_sessionManipulation;

    public function __construct() {
        parent::__construct();
        $this->_sessionManipulation = new SessionManipulation();
    }

//    your category's functions
 public function getAllCategories(){
     $sql = 'select * from categories';
     $result = $this->_db->connection->query($sql);
     $res=array();
     while ($row = $result->fetch_assoc()){
         $res[]=$row;
     }
     return $res;

 }
 public function getCategoryById($id){
     $sql = 'select * from categories WHERE id=\'' . $id . '\'';
     $result = $this->_db->connection->query($sql);
     if (!empty($result)){
         return $result->fetch_assoc();
     }
     return array();
 }
 private function getCategoryByName($name){
     $query = 'SELECT * FROM categories WHERE category_name IN (\'' . $name  . '\') LIMIT 1';
     $result = $this->_db->connection->query($query);
     $num = $result->num_rows;
     if ($num == 1) {
         return 'Category name is busy';
     }
     return '';
 }
  public  function checkValidDataForCategoryData($inputData)
    {
        $errorMess = [];
        if (empty($inputData['category_name'])) {
            $errorMess[] = 'false';
        }
        if (!empty($this->getCategoryByName($inputData['category_name']))){
            $errorMess[] = $this->getCategoryByName($inputData['category_name']);
        }
        return $errorMess;
    }
  public  function checkValidDataForEditCategoryData($inputData)
    {
        $errorMess = [];
        if (empty($inputData['category_name'])) {
            $errorMess[] = 'false';
        }
        return $errorMess;
    }
  public function addCategory($inputData){
      $sql = 'INSERT INTO categories (category_name, subcategories) VALUES (\'' . $inputData['category_name'] . '\' , \'' . $inputData['subcategories'] . '\' )';
      return $this->_db->connection->query($sql);
  }
  public function editCategory($inputData, $category_id){
        $sql = 'update categories set category_name=\'' . $inputData['category_name'] . '\', subcategories=\''. $inputData['subcategories'] . '\' where id=\'' . $category_id . '\'';
        return $this->_db->connection->query($sql);
  }
  public function deleteCategory($category_id){
      $sql = 'delete from categories WHERE id=\'' . $category_id . '\'';
      return $this->_db->connection->query($sql);
  }

}