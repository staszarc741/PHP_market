<?php
namespace core;

use exceptions\NotFoundException;

class Route {
    /**
     * function reads the url, identifies the name of the controller and action, creates an object of class and the controller calls a class method.
     *
     */
    static function start() {
        $routes = static::_parsingUrlRequest($_SERVER['REQUEST_URI']);
        static::_setController($routes['controller'], $routes['action']);
    }

    /**
     * parse url request
     *
     * @param string $path
     * @return array
     */
    static function _parsingUrlRequest($path)
    {
        $routes = explode('/', $path);
        if (!empty($routes[2])) {
            $controller = [
                'controller' => $routes[2]
            ];
        } else {
            $controller = [
                'controller' => CONTROLLER_BY_DEFAULT
            ];
        }
        if (!empty($routes[3])) {
            $action =  [
                'action' => $routes[3]
            ];
        } else {
            $action = [
                'action' => ACTION_BY_DEFAULT
            ];
        }
        $parsed = array_merge($controller, $action);
        return $parsed;
    }


    /**
     * creates an object of class controller and calls method of this controller
     *
     * @param string $controllerName
     * @param string $actionName
     * @throws NotFoundException
     */
    static function _setController($controllerName, $actionName) {
        $controllerName = '\controllers\\' . ucfirst($controllerName) . 'Controller';
        if (!class_exists($controllerName)){
            throw new NotFoundException('Not found controller');
        }
        $controller = new $controllerName($actionName);

        if (!method_exists($controller, $actionName)) {
            throw new NotFoundException('Not found action');
        }
        $controller->$actionName();
    }
}
