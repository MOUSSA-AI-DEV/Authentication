<?php
session_start();

// Composer autoload
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\CandidateController;
use App\Controllers\RecruiterController;
use App\Controllers\AdminController;


$router = new Router();

$router->get('/login', [AuthController::class, 'loginForm']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'registerForm']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);


$router->get('/candidate/dashboard', [CandidateController::class, 'dashboard'], ['candidate']);
$router->get('/recruiter/dashboard', [RecruiterController::class, 'dashboard'], ['recruiter']);
$router->get('/admin/dashboard', [AdminController::class, 'dashboard'], ['admin']);

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
 