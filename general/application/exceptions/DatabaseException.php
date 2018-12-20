<?php

namespace exceptions;

class DatabaseException extends \Exception {

    /**
     * DatabaseException constructor.
     * @param string $message
     * @param int $code
     */
    public function __construct ($message = 'Failed query', $code = 510){
        parent::__construct($message, $code);
    }
}