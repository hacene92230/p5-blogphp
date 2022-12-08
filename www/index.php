<?php
use System\Coeur\Application\LoadController;
require_once '../vendor/autoload.php';
$controller = $_GET['page'] ?? 'Accueil';
$action = $_GET['action'] ?? 'accueil';
(new LoadController($controller, $action))->call();
?>