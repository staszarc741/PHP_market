<?php

namespace components;

class Response{
    
    /**
     * redirect to page by url and stop script
     *
     * @param string $url
     */
    public function redirect($url) {
        header("location: " . $url);
        exit;
    }
}
