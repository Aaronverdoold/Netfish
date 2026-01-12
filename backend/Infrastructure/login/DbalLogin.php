<?php

declare(strict_types=1);

namespace Infrastructure\login;

use Exception;
use PDO;
use Throwable;

class DbalLogin
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUser($user)
    {
        $sql = "SELECT username, password, is_admin FROM user WHERE username = :username";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':username' => $user->username]);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                return null;
            }

            if (!isset($user->password) || !password_verify($user->password, $row['password'])) {
                return null;
            }

            return [
                'username' => $row['username'],
                'is_admin' => $row['is_admin']
            ];
        } catch (Throwable $e) {
            throw new Exception('Error fetching user: ' . $e->getMessage(), 0, $e);
        }
    }

}
