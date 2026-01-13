<?php

declare(strict_types=1);

require_once __DIR__ . "/../../Database/dbconnect.php";
require_once __DIR__ . "/../../Infrastructure/login/DbalUpdatePassword.php";

use Infrastructure\login\DbalUpdatePassword;

class UpdatePasswordController extends Database
{
    public function resetPassword(string $username, string $newPassword): bool
    {
        $pdo = $this->connect();
        $dbal = new DbalUpdatePassword($pdo);
        return $dbal->updatePassword($username, $newPassword);
    }
}
