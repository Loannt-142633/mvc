<?php
namespace MVC\Webroot;

use MVC\Dispatcher;
use MVC\Router;
use MVC\Request;

require 'F:\xampp\htdocs\mvc/vendor/autoload.php';
define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT . 'Config/core.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>