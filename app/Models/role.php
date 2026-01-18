<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Role
{
   
    public static function findIdByName(string $name): ?int
    {
        $pdo = Database::getInstance();

        $stmt = $pdo->prepare("
            SELECT id
            FROM roles
            WHERE name = :name
            LIMIT 1
        ");

        $stmt->execute([
            'name' => $name
        ]);

        $role = $stmt->fetch(PDO::FETCH_ASSOC);

        return $role ? (int) $role['id'] : null;
    }
}
