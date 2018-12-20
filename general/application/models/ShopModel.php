<?php
/**
 * Created by PhpStorm.
 * User: User1
 * Date: 12.06.2017
 * Time: 17:36
 */

namespace models;

use core\Model;
use core\SessionManipulation;

class ShopModel extends Model
{
    private $_sessionManipulation;

    public function __construct() {
        parent::__construct();
        $this->_sessionManipulation = new SessionManipulation();
    }

    public function getAllCategories(){
        $sql = 'select * from categories';
        $result = $this->_db->connection->query($sql);
        $res=array();
        while ($row = $result->fetch_assoc()){
            $res[]=$row;
        }
        return $res;

    }
    public function getProductById($product_id){
        $sql ='select * from products where id=\''. $product_id . '\'';
        $result= $this->_db->connection->query($sql);
        if (!empty($result)) {
            return $result->fetch_assoc();
        }
        return array();
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
    public function getCategoryById($id){
        $sql = 'select * from categories WHERE id=\'' . $id . '\'';
        $result = $this->_db->connection->query($sql);
        if (!empty($result)){
            return $result->fetch_assoc();
        }
        return array();
    }
    public function getProductsByCategoryId($id) {
        $category = $this->getCategoryById($id);
        $sql = 'select * from products where category_name=\'' . $category['category_name'] . '\'';
        $result = $this->_db->connection->query($sql);
        $res=[];
        while($rows = $result->fetch_assoc()){
            $res[]=$rows;
        }
        return $res;
    }
}