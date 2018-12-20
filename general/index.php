<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once dirname(__DIR__) . '/general/configs/constants.php';
require_once ABSOLUTE_PATH . '/application/bootstrap.php';

// переписати роут, там де перевіряє контроллер і акшн по дефолту