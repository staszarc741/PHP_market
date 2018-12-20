<?php
use \core\Autoload;
use \core\Route;
use \core\ErrorsExceptionHandler;
use \core\SessionManipulation;

require_once ABSOLUTE_PATH . '/application/core/Autoload.php';
require_once ABSOLUTE_PATH . '/application/core/ErrorsExceptionHandler.php';

spl_autoload_register(array(new Autoload(), 'autoload'));
set_error_handler(array(new ErrorsExceptionHandler(), 'handleError'));
set_exception_handler(array(new ErrorsExceptionHandler(), 'handleException'));
SessionManipulation::start();
Route::start();