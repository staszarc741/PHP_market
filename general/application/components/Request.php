<?php

namespace components;

class Request {

    public $postData;
    public $partOfURL = [];
    private $_method;
    
    public function __construct() {
        $this->_setMethod();
        $this->_setPostData();
        $this->_setPathUrl();
    }

    /**
     * check request method
     *
     * @param string $method
     * @return bool
     */
    public function checkMethod($method) {
        return $this->_method === $method;
    }

    /**
     * check is isset post value
     * 
     * @param string $value
     * @return bool
     */
    public function isIssetPost($value) {
        return isset($_POST[$value]);
    }

    /**
     * set in property _method name request method
     */
    private function _setMethod() {
        $this->_method = $_SERVER['REQUEST_METHOD'];
    }

    /**
     * set in property postData trimmed data from POST
     */
    private function _setPostData() {
        $this->postData = $this->_trimData($_POST);
    }

    /**
     * trim data
     *
     * @param array $data
     * @return array
     */
    private function _trimData($data) {
        foreach ($data as $key => $field) {
            $data[$key] = trim($data[$key]);
        }
        return $data;
    }

    /**
     *  Parse a URL and return path of URL
     */
    private function _setPathUrl(){
        $parsedURL = explode('/', $_SERVER['REQUEST_URI']);
        foreach ($parsedURL as $part) {
            $pos = strpos($part, ':');
            if (!empty($pos)){
                $piece = explode(':', $part);
                $this->partOfURL = array_merge($this->partOfURL, [
                    $piece[0] => $piece[1]
                ]);
            }
        }
        if(empty($this->partOfURL['page'])){
            $this->partOfURL['page'] = 1;
        }
    }
}