<?php

declare(strict_types=1);

require_once __DIR__ . "/../../Database/dbconnect.php";
require_once __DIR__ . "/../../Domain/User.php";
require_once __DIR__ . "/../../Infrastructure/registreer/DbalUser.php";
require_once __DIR__ . "/../../CustomExceptions/UserRegistrationCustomException.php";

use CustomExceptions\UserRegistrationCustomException;
use Domain\User;
use Infrastructure\registreer\DbalUser;

class RegistreerController extends Database
{
    public function register(User $user)
    {
        $db = $this->connect();
        $userRepo = new DbalUser($db);
        $result = $userRepo->insertUser($user);

        if (!$result) {
            throw new UserRegistrationCustomException("User registration failed.");
        }

        header('Location: ../../../frontend/login-page/login.html');
        exit;
    }

}
