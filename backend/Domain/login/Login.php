<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Domain/User.php';
require_once __DIR__ . '/../../Presentation/login/LoginController.php';

use Domain\User;
use CustomExceptions\LoginFailedCustomException;

$user = new User(
    null,
    $_POST['username'],
    null,
    $_POST['password'],
    0,
);

$user->username = $_POST['username'];
$user->password = $_POST['password'];

$controller = new LoginController();

try {
    $message = $controller->login($user);
    echo $message;

} catch (LoginFailedCustomException $e) {
    echo $e->getMessage();
}
