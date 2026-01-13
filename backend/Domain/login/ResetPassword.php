<?php

declare(strict_types=1);

use CustomExceptions\ResetPasswordCustomException;

require_once __DIR__ . "/../../Presentation/login/UpdatePasswordController.php";

$username = $_POST['username'] ?? null;
$newPassword = $_POST['new_password'] ?? null;

if (!$username || !$newPassword) {
    die("Username and new password are required.");
}

$controller = new UpdatePasswordController();

try {
    $success = $controller->resetPassword($username, $newPassword);
    if ($success) {
        header('Location: ../../../frontend/login/login.html');
    } else {
        echo "Password reset failed. Make sure the username exists.";
    }
} catch (ResetPasswordCustomException $e) {
    echo $e->getMessage();
}
