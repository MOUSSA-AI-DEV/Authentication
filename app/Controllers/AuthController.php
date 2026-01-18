<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{

    public function loginForm()
    {
        echo "<h1>LoginForm appelé !</h1>";
        include __DIR__ . '/../Views/auth/login.php';
    }
    public function login()
    {
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $this->view('auth/login');
            return;
        }

        $user = User::findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['error'] = "Identifiants incorrects";
            $this->view('auth/login');
            return;
        }

        $_SESSION['user'] = [
            'id'    => $user['id'],
            'email' => $user['email'],
            'role'  => $user['role']
        ];

        header('Location: /Authentication/public/index.php/' . $user['role'] . '/dashboard');
        exit;
    }


    public function registerForm()
    {
        $this->view('auth/registre');
    }

    
    public function register()
    {
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $role     = $_POST['role'] ?? '';

        if (empty($email) || empty($password) || empty($role)) {
            $this->view('auth/register');
            return;
        }

        $roleId = Role::findIdByName($role);

        if (!$roleId) {
            $this->view('auth/register');
            return;
        }

        User::create($email, $password, $roleId);

        header('Location: /Authentication/public/index.php/login');
        exit;
    }

 
    public function logout()
    {
        session_destroy();
        header('Location: /Authentication/public/index.php/login');      
          exit;
    }
}
