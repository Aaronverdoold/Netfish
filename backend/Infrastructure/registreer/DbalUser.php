<?php

declare(strict_types=1);

namespace Infrastructure\registreer;

use Exception;
use Throwable;

class DbalUser
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertUser($user)
    {
        $sql = "INSERT INTO user (username, email, password, is_admin )
                VALUES (:username, :email, :password, :is_admin)";

        try {
            $stmt = $this->pdo->prepare($sql);
            $insert = $stmt->execute([
                ':username' => $user->username,
                ':email' => $user->email,
                ':password' => password_hash($user->password, PASSWORD_BCRYPT),
                ':is_admin' => $user->is_admin
            ]);

            if (!$insert) {
                return null;
            }

            return true;

        } catch (Throwable $e) {
            throw new Exception('Error inserting user: ' . $e->getMessage(), 0, $e);
        }
    }
}
