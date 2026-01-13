<?php

declare(strict_types=1);

require_once __DIR__ . "/../../Domain/Movie.php";
require_once __DIR__ . "/../../Presentation/videos/AddVideoController.php";

use Domain\Movie;
use videos\AddVideoController;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $movie = new Movie(
        null,
        $_POST["title"] ?? '',
        $_POST["url"] ?? '',
        $_POST["year"] ?? null,
        $_POST["description"] ?? null
    );

    $controller = new AddVideoController();
    $controller->AddVideo($movie);
}
