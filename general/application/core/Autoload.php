<?php
namespace core;

class Autoload {
    /**
     * function for autoload files with classes
     *
     * @param string $class
     */
    static function autoload($class) {
        $class = str_replace('\\', '/', $class);
        if (file_exists(ABSOLUTE_PATH . '/application/' . $class . '.php')){
            require_once ABSOLUTE_PATH . '/application/' . $class . '.php';
        }
    }
}
