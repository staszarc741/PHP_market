<?php

namespace exceptions;

class MethodNotAllowedException extends \Exception{

    /**
     * MethodNotAllowedException constructor.
     * @param string $message
     * @param int $code
     */
    public function __construct ($message = 'Method not allowed', $code = 405) {
        parent::__construct($message, $code);
    }
}