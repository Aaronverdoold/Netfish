<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Domain/User.php';
require_once __DIR__ . '/../../Presentation/login/LoginController.php';

use Domain\User;
use CustomExceptions\LoginFailedCustomException;

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

$user = new User(
    null,
    $_POST['username'],
    null,
    $_POST['password'],
    0,
);

$user->username = $username;
$user->password = $password;

$controller = new LoginController();

try {
    $controller->login($user);

} catch (LoginFailedCustomException $e) {
    echo $e->getMessage();
}
