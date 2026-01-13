<?php

use CustomExceptions\FetchingListVideosFailedCustomException;
use videos\VideosController;

header("Content-Type: application/json");

require_once __DIR__ . "/../../Presentation/videos/VideosController.php";

$controller = new VideosController();

try {
    $videos = $controller->list();
    echo json_encode($videos);
} catch (FetchingListVideosFailedCustomException $e) {
    echo $e->getMessage();
}
