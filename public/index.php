<?php

session_start();
//charge les class autoload 
require_once '../vendor/autoload.php';
use App\Core\Router;
$router=new Router();

// les routes possible il doit l ajouter ici

$router->dispach($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);