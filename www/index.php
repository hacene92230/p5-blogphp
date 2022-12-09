<?php
use System\Coeur\Application\LoadController;
require_once '../vendor/autoload.php';
$controller = $_GET['page'] ?? 'Home';
$action = $_GET['action'] ?? 'home';
(new LoadController($controller, $action))->call();
//just a test comment
?>