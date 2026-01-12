<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Domain/User.php';
require_once __DIR__ . '/../../Presentation/registreer/RegistreerController.php';

use Domain\User;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = new User(
        null,
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
        0
    );

    $controller = new RegistreerController();
    $controller->register($user);
}
