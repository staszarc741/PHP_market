<?php

namespace exceptions;

class NotFoundException extends \Exception{

    /**
     * NotFoundException constructor.
     * @param string $message
     * @param int $code
     */
    public function __construct ($message = 'Not found', $code = 404) {
        parent::__construct($message, $code);
    }
}