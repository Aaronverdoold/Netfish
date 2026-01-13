<?php

declare(strict_types=1);

namespace Infrastructure\login;

use PDO;
use Exception;
use Throwable;

class DbalUpdatePassword
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function updatePassword(string $username, string $newPassword): bool
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET password = :password WHERE username = :username";

        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':password' => $hashedPassword,
                ':username' => $username
            ]);
        } catch (Throwable $e) {
            throw new Exception("Error updating password: " . $e->getMessage(), 0, $e);
        }
    }
}
