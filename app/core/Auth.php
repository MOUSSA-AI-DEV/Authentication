<?php

namespace App\Core;

class Auth
{

    public static function check(array $roles): void
    {
        session_start(); 

        if (!isset($_SESSION['user'])) {
            header('Location: /Authentication/public/index.php/login');
            exit;
        }

        if (!in_array($_SESSION['user']['role'], $roles)) {
            http_response_code(403);
            include __DIR__ . '/../Views/errors/403.php';
            exit;
        }
    }
}
