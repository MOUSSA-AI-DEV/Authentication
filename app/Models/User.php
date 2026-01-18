<?php

namespace App\Models;

use App\Core\Database;
use PDO;
class User
{
    public static function findByEmail(string $email): ?array
    {
        $pdo = Database::getInstance();

        $stmt = $pdo->prepare("
            SELECT 
                users.id,
                users.email,
                users.password,
                roles.name AS role
            FROM users
            JOIN roles ON users.role_id = roles.id
            WHERE users.email = :email
        ");

        $stmt->execute([
            'email' => $email
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }
    public static function create(string $email, string $password, int $roleId): bool
    {
        $pdo = Database::getInstance();

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("
            INSERT INTO users (email, password, role_id)
            VALUES (:email, :password, :role_id)
        ");

        return $stmt->execute([
            'email'    => $email,
            'password' => $hashedPassword,
            'role_id'  => $roleId
        ]);
    }
}
