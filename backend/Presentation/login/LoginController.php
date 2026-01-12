<?php

declare(strict_types=1);

require_once __DIR__ . "/../../Database/dbconnect.php";
require_once __DIR__ . "/../../Domain/User.php";
require_once __DIR__ . "/../../Infrastructure/login/DbalLogin.php";
require_once __DIR__ . "/../../CustomExceptions/LoginFailedCustomException.php";

use CustomExceptions\LoginFailedCustomException;
use Domain\User;
use Infrastructure\login\DbalLogin;

class LoginController extends Database
{
    public function login(User $user)
    {
        $pdo = $this->connect();
        $login = new DbalLogin($pdo);
        $result = $login->getUser($user);

        if (!$result) {
            throw new LoginFailedCustomException("Login failed: Invalid username or password.");
        }

        $admin = $result['is_admin'] === 1;

        if ($admin) {
            header('Location: ../../../frontend/beheer-page/beheer.html');
        } else {
            header('Location: ../../../frontend/home-page/home.html');
        }

        return "Login successful. Welcome, " . htmlspecialchars($result['username']) . "!";
    }

}
