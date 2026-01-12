<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Presentation/login/LogoutController.php';

use login\LogoutController;

$logout = new LogoutController();

$logout->logout();
