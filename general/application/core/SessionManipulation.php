<?php

namespace core;

class SessionManipulation {
    
    public $sectionSessionArray;

    /**
     * start session
     */
    public static function start(){
        session_start();
    }

    /**
     * record information as a part of the session array
     *
     * @param string $arraySection
     * @param array $information
     */
    public function recordInformation($arraySection, $information) {
        $_SESSION[$arraySection] = $information;
    }

    /**
     * get part of session array
     * 
     * @param string $arraySection
     * @return mixed|null
     */
    public function getSection($arraySection){
        if (empty($_SESSION[$arraySection])){
            return null;
        }
        return $_SESSION[$arraySection];
    }

    /**
     * unset section of session array
     * 
     * @param string $arraySection
     */
    public function unsetSection($arraySection) {
        unset($_SESSION[$arraySection]);
    }
    
}