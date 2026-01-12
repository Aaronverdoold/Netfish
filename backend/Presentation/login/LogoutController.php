<?php

declare(strict_types=1);

namespace login;

use CustomExceptions\LogoutFailedCustomException;
use Throwable;

class LogoutController
{
    public function logout()
    {
        try {
            session_start();
            session_unset();
            session_destroy();
        } catch (Throwable $e) {
            throw new LogoutFailedCustomException("Logout failed: " . $e->getMessage());
        }

        header('Location: ../../../frontend/login/login.html');
        exit;
    }

}
