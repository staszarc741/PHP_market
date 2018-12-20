<?php

namespace components;

class Validate {
    /**
     * validate min length for string
     *
     * @param $inputString
     * @param int $limit
     * @return bool
     */
    public function validateMinLengthForString($inputString, $limit = 8) {
        return (strlen($inputString) >= $limit);
    }

    /**
     * check regular expression for email
     *
     * @param $email
     * @return bool
     */
    public function regularExpressionsForEmail($email) {
        return (boolean)(filter_var($email, FILTER_VALIDATE_EMAIL));
    }

}