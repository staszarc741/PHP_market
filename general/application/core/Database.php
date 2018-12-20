<?php

namespace core;

use exceptions\MethodNotAllowedException;

class Database{
    /**
     * @var \mysqli
     */
    public $connection;

    public function __construct() {
        $this->connection();
    }

    /**
     * connecting to database
     *
     * @return \mysqli
     * @throws \Exception
     */
    public function connection() {
        $this->connection = new \mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_NAME_DATABASE);
        if($this->connection->connect_errno) {
            throw new MethodNotAllowedException($this->connection->connect_error);
        }
    }

    public function disconnect() {

    }
}
