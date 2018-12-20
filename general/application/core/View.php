<?php
namespace core;

class View {

    private $data = [];
    private $template;
    private $layout = 'layout';

    /**
     * set data in $data property
     *
     * @param array $value
     */
    public function setData(array $value) {
        $this->data = array_merge($this->data, $value);
    }

    /**
     * set template in $template property
     *
     * @param $template
     */
    public function setTemplate($template) {
        $this->template = $template;
    }

    /**
     * generate page with layout
     */
    public function generate() {
        $this->_requireLayoutWithData(array('content' => $this->_requireViewWithData()));
    }

    /**
     * require view with data
     */
    private function _requireViewWithData(){
        extract($this->data);
        require_once ABSOLUTE_PATH . '/application/views/' . $this->template . '.php';
    }

    /**
     * require layout with data
     *
     * @param array $data
     */
    private function _requireLayoutWithData($data = array()){
        extract($data);
        require_once ABSOLUTE_PATH . '/application/views/' . $this->layout . '.php';
    }
}