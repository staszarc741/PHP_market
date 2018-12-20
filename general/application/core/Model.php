<?php
namespace core;

use components\Validate;

class Model {

    protected $_db;
    /**
     * @var Validate
     */
    protected $_validate;
    protected $_currentId;

    public function __construct () {
        $this->_db = new Database();
        $this->_validate = new Validate();
    }

    /**
     * returnAssociative array
     * 
     * @param \mysqli_result $result
     * @return array
     */
    public function returnAssociativeArray($result) {
        $res = array();
        while ($row = $result->fetch_assoc()) {
            $res[] = $row;
        }
        return $res;
    }
}
