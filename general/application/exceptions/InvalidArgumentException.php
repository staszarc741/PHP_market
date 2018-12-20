<?php

namespace exceptions;

class InvalidArgumentException extends \Exception{

    /**
     * InvalidArgumentException constructor.
     * @param string $message
     * @param int $code
     */
    public function __construct ($message = 'Failed argument', $code = 510){
        parent::__construct($message, $code);
    }
}